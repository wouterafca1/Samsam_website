@extends('layouts.app')

@section('content')

<div class="container">
    <div id="sidemenu" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
    <script>
        function openNav() {
            document.getElementById("sidemenu").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("sidemenu").style.width = "0";
        }
    </script>
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
        <tr class="list">

            <th class="week">Week: <?php echo $week; ?>  </th>
            <?php
            do {
                echo "<th class='dag'>" . $dt->format('l') . "<br>" . $dt->format('d M Y') . "</th>\n";
                $dt->modify('+1 day');
            } while ($week == $dt->format('W'));
            ?>
        </tr>
        @foreach($users as $user)
            <tr>
                <td class="naam">{{ $user->name }}</td>
                <td class="content">1</td>
                <td class="content">2</td>
                <td class="content">3</td>
                <td class="content">4</td>
                <td class="content">5</td>
                <td class="content">6</td>
                <td class="content">7</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
