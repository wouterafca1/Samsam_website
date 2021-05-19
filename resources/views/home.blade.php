@extends('layouts.app')

@section('content')
    <?php

    date_default_timezone_set('Europe/Amsterdam');

    // Get prev & next month
    if (isset($_GET['ym'])) {
        $ym = $_GET['ym'];
    } else {
        // This month
        $ym = date('Y-m');
    }

    // Check format
    $timestamp = strtotime($ym . '-01');  // the first day of the month
    if ($timestamp === false) {
        $ym = date('Y-m');
        $timestamp = strtotime($ym . '-01');
    }

    $today = date('Y-m-j');

    $title = date('F, Y', $timestamp);

    // Create prev & next month link
    $prev = date('Y-m', strtotime('-1 month', $timestamp));
    $next = date('Y-m', strtotime('+1 month', $timestamp));

    // Number of days in the month
    $day_count = date('t', $timestamp);

    // 1:Mon 2:Tue 3: Wed ... 7:Sun
    $str = date('N', $timestamp);

    // Array for calendar
    $weeks = [];
    $week = '';

    // Add empty cell(s)
    $week .= str_repeat('<td></td>', $str - 1);

    for ($day = 1; $day <= $day_count; $day++, $str++) {

        $date = $ym . '-' . $day;

        if ($today == $date) {
            $week .= '<td class="today">';
        } else {
            $week .= '<td class="nummer">';
        }
        $week .= $day . '</td>';

        // Sunday OR last day of the month
        if ($str % 7 == 0 || $day == $day_count) {

            // last day of the month
            if ($day == $day_count && $str % 7 != 0) {
                // Add empty cell(s)
                $week .= str_repeat('<td></td>', 7 - $str % 7);
            }

            $weeks[] = '<tr>' . $week . '</tr>';

            $week = '';
        }
    }
?>

<div class="container">
    <div class="container">
        <ul class="list-inline">
            <li class="list-inline-item"><a href="?ym=<?= $prev; ?>" class="btn btn-link">&lt; Vorige</a></li>
            <li class="list-inline-item"><span class="title"><?= $title; ?></span></li>
            <li class="list-inline-item"><a href="?ym=<?= $next; ?>" class="btn btn-link">Volgende &gt;</a></li>
        </ul>
        <p class="text-right"><a href="/home">Vandaag</a></p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="dag">Maandag</th>
                <th class="dag">Dinsdag</th>
                <th class="dag">Woensdag</th>
                <th class="dag">Donderdag</th>
                <th class="dag">Vrijdag</th>
                <th class="dag">Zaterdag</th>
                <th class="dag">Zondag</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($weeks as $week) {
                echo $week;
            }
            ?>
            </tbody>
        </table>
    </div>




</div>
@endsection
