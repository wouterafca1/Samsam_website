@extends('layouts.app')

@section('content')

    <script>
        <?php
        echo "const arr = " . json_encode($users) . ";";
        ?>

        console.log(arr);
    </script>

    <div class="container">
        @if(Auth()->user()->functie == "Werkgever")
            <div id="sidemenu" class="sidenav">
                <form method="post" action=" {{url('home')}}">
                <a href="#" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="#" id="username"></a>
                    @csrf
                    <table>
                        <th>
                            <tr><label class="begintijd">Begintijd:</label><input name="starttime" id="starttime" class="starttime"
                                                                                  type="datetime-local"><br></tr>
                            <tr><label class="eindtijd">Eindtijd:</label><input name="endtime" id="endtime" class="endtime"
                                                                                type="datetime-local"></tr>

                            <input type="hidden" name="name" id="name" value=""/>

                        </th>
                    </table>
                    <div class="inplannen">
                        <input type="submit" value="{{ __('Plan in') }}">
                    </div>
                </form>

            </div>
        @endif
        <script>
            function openNav(userid) {
                document.getElementById("sidemenu").style.width = "400px";

                for (let i = 0; i < arr.length; i++) {
                    if (arr[i].id == userid) {
                        document.getElementById('username').innerHTML = arr[i].name;
                        document.getElementById('name').value = arr[i].name;
                    }
                }
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
        $today = date('d M Y');
        $dateweek = date('W');

        ?>


        <table>
            <tr class="list">

                <th class="week"><a
                        href="<?php echo $_SERVER['PHP_SELF'] . '?week=' . ($week - 1) . '&year=' . $year; ?>"><</a>
                    Week: <?php echo $week; ?>
                    <a href="<?php echo $_SERVER['PHP_SELF'] . '?week=' . ($week + 1) . '&year=' . $year; ?>">></a> <br>
                    <a href="<?php echo $_SERVER['PHP_SELF'] . '?week=' . ($dateweek) . '&year=' . $year;?>">Vandaag</a>
                </th>

                <?php
                do {
                    if ($today === $dt->format('d M Y')) {
                        echo "<th class='today'>" . $dt->format('l') . "<br>" . $dt->format('d M Y') . "</th>\n";
                        $dt->modify('+1 day');
                    } else {
                        echo "<th class='dag'>" . $dt->format('l') . "<br>" . $dt->format('d M Y') . "</th>\n";
                        $dt->modify('+1 day');
                    }
                } while ($week == $dt->format('W'));
                ?>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td class="naam" onclick="openNav({{ $user->id }})">{{ $user->name }} </td>
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
