<?php 
$fun = getdate(); 
echo "Has entrado en esta pagina a las $fun[hours] horas, con $fun[minutes] minutos y $fun[seconds] segundos, del $fun[mday]/$fun[mon]/$fun[year]"; 
?> 

<!-- El codigo nos devuelve: Has entrado esta paginas a las 20 horas, con 52 minutos y 45 segundos, del 26/09/2024 !-->

<?php 
function sumar($sumando1,$sumando2){    
    $suma=$sumando1+$sumando2;     
    echo $sumando1."+".$sumando2."=".$suma;  
                                    }  
sumar(5,6); 
?> 

<!-- El codigo devuelve: "5 `+ 10 = 11" !--> 