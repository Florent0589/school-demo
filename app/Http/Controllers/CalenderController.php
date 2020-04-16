<?php

namespace App\Http\Controllers;

use App\Calender;
use App\Grade;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Auth;

class CalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $req = \request()->all();
        //
        $date = date('Y-m-d');
        if(isset($req['my_date']))
        {
            $date = $req['my_date'];
        }

        $date_pieces = explode('-', $date);

        $day  = $date_pieces[2];
        $year  = $date_pieces[0];
        $month  = $date_pieces[1];

        $days_count     = date('t', mktime(0,0,0, $month, $day, $year));
        $current_day    = date('d', mktime(0,0,0, $month, $day, $year));
        $week_day_first = date('N', mktime(0, 0, 0, $month, $day, $year));

        $carbon             = new \Carbon\Carbon($date);
        $yesterday          =  $year .'-'.$month. '-'.($day -1);
        $next_week          =  $year .'-'.$month. '-'.($day +7);

        $monthstart          =  $year .'-'.$month. '-'.(1);
        $mothend             =  $year .'-'.$month. '-'.$days_count;
        $now                = date('Y-m-d H:i:s');
        $day_of_the_week    = $carbon::getDays();

        $now_time           = date('H:i:s', strtotime($now));

        $upcoming_events = Calender::whereBetween('calender_date', [$date, $mothend])->get()->toArray();
        $month_events = Calender::whereBetween('calender_date', [$monthstart, $mothend])->get()->toArray();
        $events = Calender::all();

        $upcoming_events_sort = [];
        foreach (array_merge($upcoming_events, $month_events) as $calender_event)
        {
            $upcoming_events_sort[$calender_event['calender_date']][$calender_event['id']] = $calender_event;
        }



        $strwidgetTags = '';
        $strwidgetTags .="<div>";
        $strwidgetTags .="<ul>";

        $strwidgetTags .="<li style='list-style: none;'><i class='fa fa-calendar'></i><strong> ".date("F jS, Y", strtotime($date))."</strong> <input onchange='JavaScriptManager.getMyDate(this.value)' style='float: right;cursor: pointer;' type='date' name='my_date' id='my_date' value='".$date."'></li>";
        $strwidgetTags .="</ul>";
        $strwidgetTags .="</div>";


        $strwidgetTags .= "<table class=\"table\"  style='padding: 5px;min-height: 80px;'>";
        $strwidgetTags .= "<thead class=\"thead-dark\">";

        if(\request()->has('g')){
            $strwidgetTags .= "<th scope=\"col\" >PERIOD</th>";
            $strwidgetTags .= "<th scope=\"col\" >TIME</th>";
        }

        $strwidgetTags .= "<th scope=\"col\" >MO</th>";
        $strwidgetTags .= "<th scope=\"col\" >TU</th>";
        $strwidgetTags .= "<th scope=\"col\" >WE</th>";
        $strwidgetTags .= "<th scope=\"col\" >TH</th>";
        $strwidgetTags .= "<th scope=\"col\" >FR</th>";

        if(!\request()->has('g')){
            $strwidgetTags .= "<th scope=\"col\" style=\"color: #da7676;\">SA</th>";
            $strwidgetTags .= "<th scope=\"col\" style=\"color: #da7676;\">SU</th>";
        }

        $strwidgetTags .= "</thead>";
        $strwidgetTags .= "<tbody>";
        for ($w = 1 - $week_day_first + 1; $w <= $days_count; $w = $w + 7):

                    $strwidgetTags .= "<tr style='padding: 10px;'>";
                        $counter = 0;
                        if(\request()->has('g')){
                            $strwidgetTags .= '<td onclick="JavaScriptManager.getTimeTablePeriod()" style="background-color: rgb(12, 84, 96); cursor: pointer; font-weight: bold; padding: 20px; text-align: center;"><i title="School Day" class="fa fa-ticket" style="float: left;"></i><br><input type="hidden" id="clicked_date" name="clicked_date" value="2020-04-0-1"><br></td>';
                            $strwidgetTags .= '<td onclick="JavaScriptManager.getTimeTablePeriod()" style="background-color: rgb(12, 84, 96); cursor: pointer; font-weight: bold; padding: 20px; text-align: center;"><i title="School Day" class="fa fa-ticket" style="float: left;"></i><br><input type="hidden" id="clicked_date" name="clicked_date" value="2020-04-0-1"><br></td>';
                        }
                        for ($d = $w; $d <= $w + 6; $d++):



                            $today = $year.'-'.$month.'-'.$d;
                            $add_notice = '';
                            $today_events = [];
                            if(isset($upcoming_events_sort[$today]))
                            {
                                $today_events = $upcoming_events_sort[$today];
                                $add_notice = '<i class="fa fa-bell-o" style="" onclick="JavaScriptManager.addEventToCalender()"> '.count($today_events).'</i>';
                            }

                            $school_day = '';
                            $style_school_day = '';
                            $onclick_event = '';
                            if(\request()->has('g') && ($counter <= 4))
                            {
                                $school_day_format = ($d < 10) ? '0'.$d : $d;
                                $current_school_day = $year.'-'.$month.'-'.$school_day_format;
                                $school_day = '<i title="School Day" class="fa fa-ticket" style="float: left;"></i><br>';
                                $school_day .= '<input type="hidden" id="clicked_date" name="clicked_date" value="'.$current_school_day.'"/>';
                                $style_school_day = 'background-color:#0c5460;';
                                $onclick_event = 'onclick="JavaScriptManager.getTimeTablePeriod()"';
                            }

                            $date_weeknd = ($counter > 4) ? "color: #da7676;" : "cursor: pointer;";
                            $cur_date    = ($current_day == $d) ? "background-color:#da7676; color:#fff;font-weight:bold;" : "";

                            if(\request()->has('g') && $date_weeknd == "cursor: pointer;" or \request()->has('g') == false) {

                                $strwidgetTags .= "<td {$onclick_event} style=\"{$style_school_day}{$date_weeknd}{$cur_date}font-weight:bold; padding: 20px; text-align: center;\">";
                                $strwidgetTags .= '' . $school_day;
                                $strwidgetTags .= ($d > 0 ? ($d > $days_count ? '' : $d) : '');
                                $strwidgetTags .= '<br>' . $add_notice;
                                $strwidgetTags .= "</td>";
                            }
                            $counter++;

                        endfor;
                    $strwidgetTags .= "</tr>";
                endfor;
        $strwidgetTags .= "</tbody>";
        $strwidgetTags .= "</table>";

        if(isset($req['my_date']))
        {

            return response()->json(['strwidgetTags' => $strwidgetTags, 'date' => $date, 'upcoming_events' => count($upcoming_events)]);
        }

        if(\request()->has('g'))
        {
            $grade = Grade::find(\request()->get('g'));
            return view('timetable.timetable', compact('upcoming_events', 'events', 'date', 'grade'));
        }
        return view('learning-resource.index', compact('strwidgetTags', 'upcoming_events', 'events', 'date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
        $form_data = \request()->all();


        $new_event = new Calender();
        $new_event->title = $form_data['title'];
        $new_event->description = $form_data['description'];
        $new_event->calender_date = $form_data['calender_date'];
        $new_event->time_start = $form_data['time_start'];
        $new_event->time_stop = $form_data['time_stop'];
        $new_event->created_by = \Auth::user()->id;
        $new_event->status_id = 1;
        $new_event->save();

        return redirect('/calender')->with('success', 'Successfully Created New Event');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCalenderEvents()
    {
        $req = \request()->all();
        //
        $date = date('Y-m-d');
        if(isset($req['my_date']))
        {
            $date = $req['my_date'];
        }

        $date_pieces = explode('-', $date);

        $day  = $date_pieces[2];
        $year  = $date_pieces[0];
        $month  = $date_pieces[1];

        $days_count     = date('t', mktime(0,0,0, $month, $day, $year));
        $current_day    = date('d', mktime(0,0,0, $month, $day, $year));
        $week_day_first = date('N', mktime(0, 0, 0, $month, $day, $year));

        $carbon             = new \Carbon\Carbon($date);
        $yesterday          =  $year .'-'.$month. '-'.($day -1);
        $next_week          =  $year .'-'.$month. '-'.($day +7);

        $monthstart          =  $year .'-'.$month. '-'.(1);
        $mothend             =  $year .'-'.$month. '-'.$days_count;
        $now                = date('Y-m-d H:i:s');
        $day_of_the_week    = $carbon::getDays();

        $now_time           = date('H:i:s', strtotime($now));

        $upcoming_events = Calender::whereBetween('calender_date', [$date, $mothend])->get()->toArray();
        $month_events = Calender::whereBetween('calender_date', [$monthstart, $mothend])->get()->toArray();
        $events = Calender::all();

        $upcoming_events_view = view('learning-resource.calender-events', compact('upcoming_events'))->render();

        return response()->json(['upcoming_events' => $upcoming_events_view]);
    }
}
