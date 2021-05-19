@extends('layouts.app')

@section('content')

<div class="container">
    <?php
    $dt = new DateTime;
    if (isset($_GET['year']) && isset($_GET['week'])) {
        $dt->setISODate($_GET['year'], $_GET['week']);
    } else {
        $dt->setISODate($dt->format('o'), $dt->format('W'));
    }
    $year = $dt->format('o');
    $week = $dt->format('W');
    ?>

    <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week-1).'&year='.$year; ?>">Pre Week</a> <!--Previous week-->
    <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week+1).'&year='.$year; ?>">Next Week</a> <!--Next week-->

    <table>
        <tr>
            <th>Werknemer: </th>
            <?php
            do {
                echo "<th class='dag'>" . $dt->format('l') . "<br>" . $dt->format('d M Y') . "</th>\n";
                $dt->modify('+1 day');
            } while ($week == $dt->format('W'));
            ?>
        </tr>
        @foreach($users as $user)
            <tr class="list">
                <td>{{ $user->name }}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
