<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recepcion;
use App\Foro;
class EstadisticosController extends Controller
{
    public function index()
    {
        return view('Estadisticas');
    }
    
    public function est_recepciones(){
        
        $script_graficar = "

            var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Casos Activos', 'Casos Inactivos'],
                datasets: [{
                    label: 'Estadisticas de los casos activos e inactivos',
                    data: [".Recepcion::all()->where("estado",1)->count().",".Recepcion::all()->where("estado",0)->count()."],
                    backgroundColor: [
                        'rgba(0, 128, 0)',
                        'rgba(205, 0, 0)'
                        
                    ],
                    borderColor: [
                        'rgba(0, 0, 0)',
                        'rgba(0, 0, 0)'
                        
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    
       "; 

return view('Estadisticas',compact('script_graficar'));


    }

    public function est_recepciones2(){
        
        $script_graficar2 = "

            var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Foros Activos', 'Foros Inactivos'],
                datasets: [{
                    label: 'Estadisticas de los Foros activos e inactivos',
                    data: [".Foro::all()->where("estadoFo",1)->count().",".Foro::all()->where("estadoFo",0)->count()."],
                    backgroundColor: [
                        'rgba(0, 128, 0)',
                        'rgba(205, 0, 0)'
                        
                    ],
                    borderColor: [
                        'rgba(0, 0, 0)',
                        'rgba(0, 0, 0)'
                        
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    
       "; 

return view('Estadisticas2',compact('script_graficar2'));


    }

}
