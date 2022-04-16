<!DOCTYPE html>  
<?php require_once "../control/controlHome.php";?>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>    
    <!--<title>Dashboard Sidebar Menu</title>--> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <!--<img src="logo.png" alt="">-->
                </span>

                <div class="text logo-text">
                    <span class="name">LOLDESIGN</span>
                    <span class="profession">Telzir "estamos juntos"</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Estatistica</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notification</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Analise</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">Favoritos</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Carteira</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>    
    <section class="home">
        <div class="text">Consulta do Valor da Chamada</div>                  
        <div class="text">
            <?php
                $calls = new Calls("-","-","-","-");
                $calls->findCity();
                $calls->findPlan();
                //print_r($calls->getCitys());
            ?>
            <form method="post" action="#" >
                <select type="text" name="from" id="from">
                    <option selected disabled>Selecione a origem da chamada</option>
                    <?php
                        foreach ($calls->getCitys() as [$id, $nameCity,$code]) {
                            echo "<option value='$code'>$nameCity</option>";
                        }
                    ?>
                </select>              
                <select type="text" name="to" id="to">
                    <option selected disabled>Selecione a destino da chamada</option>                    
                    <?php
                        foreach ($calls->getCitys() as [$codeCity, $nameCity, $code]) {
                            echo "<option value='$code'>$nameCity</option>";
                        }
                    ?>
                </select>
                <select type="text" name="plan" id="plan">
                    <option selected disabled>Selecione um Plano Fale Mais</option>
                    <?php
                        foreach ($calls->getPlan() as [$id,$desc,$minute]) {
                            echo "<option value='$minute'>$desc</option>";
                        }
                    ?>
                </select>
                <input type="number" min="0" name="minute" id="minute" placeholder="Quantos minutos desejas falar?"/>
                <input type="submit" value=" Calcular "/>            
            </form>
        </div>
        <div class="text">            
            <?php
            if(isset($_POST["from"]) && isset($_POST["to"])){
                $call = new Calls($_POST["from"],$_POST["to"],$_POST["minute"],$_POST["plan"]);
                $call->price($call);
            
            ?>
            
            <table>
                <thead>
                    <tr>
                        <td>Origem</td>
                        <td>Destino</td>
                        <td>Tempo</td>
                        <td>Plano FaleMais</td>
                        <td><b>Com FaleMais</b></td>
                        <td><b>Sem FaleMais</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $call->getFrom() ?></td>
                        <td><?php echo $call->getTo() ?></td>
                        <td><?php echo $call->getMin() ?></td>
                        <td>FaleMais <?php echo $call->getPlan()?></td>
                        <td>$ <?php echo $call->getSpeackMore() ?></td>
                        <td>$ <?php echo $call->getNoSpeackMore() ?></td>
                    </tr>
                </tbody>
            </table>  
            <?php } ?>
        </div>
    </section>
    <script src="js/action.js"></script>
</body>
</html>
