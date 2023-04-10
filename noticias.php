<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <?php
        include('head.php');
    ?>
    <link href="css/estilos-noticias.css" rel="stylesheet">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    

</head>
<body >
    <?php
        include('header.php');
        include('aside.php');
    ?>
    <h1 class="titulo">NOTICIAS</h1>
    <div style="margin-left: 15%;">
        <div class="col-md-11">
            <div class="card" >
              <div class="card-body">
                <table>
                  

                  <tr>
                    <td rowspan="2" style="margin: 10%; width: 65%">
                        <div class="row">
                            <div class="col-5">
                                <h1 class="titulo-not">ExpoSport 2023</h1>
                                <p class="text">Una de las exposiciones más relevantes en América, reuniendo a las marcas líderes en equipo de gimnasio, ropa, calzado, accesorios, artículos deportivos y todo lo relacionado con la industria del fitness y bienestar <a href="" data-toggle="modal" data-target="#modal1" >ver más</a>.</p>
                            </div>
                            <div class="col-7">
                                <img class="imag" src="images/exposport.jpg" style="width: 90%; margin-right: 50px;">
                            </div>
                        </div>
                    </td>
                    <td style="width: 35%">
                        <div class="row">
                            <div class="col-7">
                                <img class="imag" src="images/ejercicio.jpg" style="width: 100%">
                            </div>
                            <div class="col-5">
                                <p style="font-size: 16px; font-weight: bold;">Una pesa y seis ejercicios compuestos para quemar grasa y ganar músculo  <a href="" data-toggle="modal" data-target="#modal2" >ver más</a></p>
                            </div>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td><div class="row">
                            <div class="col-7">
                                <img class="imag" src="images/rutina.jpg" style="width: 100%">
                            </div>
                            <div class="col-5">
                                <p style="font-size: 16px; font-weight: bold;" class="">Rutina completa para activarte tras un periodo sin hacer nada <a href="" data-toggle="modal" data-target="#modal3">ver más</a></p>
                            </div>
                        </div></td>
                  </tr>
                </table>
              </div>
            </div>
        </div>
        <div class="col-md-11">
            <div class="row">
                <div class="col-6">
                    <div class="card" >
                      <div class="card-body" style="padding: 8%; text-align: center;">
                        <a  href="" style=" text-align: center; font-size: 30px" data-toggle="modal" data-target="#modal4">8va Carrera Atlética Recreativa por "Craneosinostosis"</a>
                        <img src="images/carrera.png" style="width: 90%; margin:20px" >
                        <p class="text" style=" text-align: center">8a Carrera Atlética Recreativa 5 km por niñas y niños nacidos con Craneosinostosis (Deformidad craneal) .</p>
                      </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card" >
                      <div class="card-body" style="padding: 8%; text-align: center;">
                        <a  href="" style=" text-align: center; font-size: 30px" data-toggle="modal" data-target="#modal7">SFL StrongFirst Barbell Certificación de Instructor</a>
                        <br>
                        <img src="images/entrenador.jpg" style="width: 90%; margin:20px" >
                        <p class="text" style=" text-align: center">Bienvenido a la Certificación de Instructor de StrongFirst Lifter. Sumérgete a fondo en los powerlifts además de varios ejercicios de alto rendimiento con barra.</p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-11">
            <div class="row">
                <div class="col-6">
                    <div class="card" >
                      <div class="card-body" style="padding: 8%; text-align: center;">
                        <a  href="" style=" text-align: center; font-size: 30px" data-toggle="modal" data-target="#modal5">5 ejercicios compuestos para transformar el cuerpo: gana músculo y quema grasa</a>
                        <img src="images/ejer8.jpg" style="width: 90%; margin:20px" >
                        <p class="text" style=" text-align: center">Los ejercicios compuestos de cardio y fuerza combinan varios movimientos y activan a la vez diferentes grupos musculares, lo que permite aprovechar al máximo el tiempo de entrenamiento.</p>
                      </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card" >
                      <div class="card-body" style="padding: 8%; text-align: center;">
                        <br><a  href="" style=" text-align: center; font-size: 30px" data-toggle="modal" data-target="#modal6">"El sueño es el entrenamiento silencioso de los deportistas"</a>
                        <br><br>
                        <img src="images/dormir.jpg" style="width: 90%; margin:20px" >
                        <p class="text" style=" text-align: center">El sueño adecuado juega un papel fundamental en el rendimiento deportivo, en la recuperación física, fisiológica y metabólica, y en el estado cognitivo y anímico debido a sus efectos reparadores.</p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
   
    </div>
    <div class="modal fade" id="modal1" tabindex="-1"  aria-labelledby="modal1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title titulo-not" style="text-align: center;font-size: 23px" id="modalTitle"><span style="font-size: 32px;">ExpoSport</span> <br> International Business Fitness and Wellness 2023</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body" style="font-size: 20px; text-align: center">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/8-xf0VYB1jI" frameborder="0" allowfullscreen></iframe>
            <p style="font-weight: bold; color: #6820C4;text-align:right;">
                <br>
                Fecha: 21 de Mayo de 2023
                <br>
                Lugar: Guadalajara, Jalisco, México.  
            </p>
            <p style="font-weight: bold">Adquiere tus boletos en <a href="https://exposport.mx/boletos/">exposport.mx/boletos</a></p>
         
            La exposición se caracteriza por tener las principales estrella fitness de México y el mundo, esta edición no será la excepción, integramos aún más atletas e influencers de la industria fitness, que nutrieron el evento con consejos, detalles y contenido de valor para todos los visitantes y espectadores.     
            <br>
            Consolidada como una de las exposiciones más importantes en América, concentrando a las principales marcas en equipo de gimnasio, suplementos alimenticios, ropa, calzado, accesorios, artículos deportivos y todo lo relacionado con la industria fitness y wellness.
    
            </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal2" tabindex="-1"  aria-labelledby="modal2" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title titulo-not" style="text-align: center;font-size: 23px" id="modalTitle"><span style="font-size: 32px;">Una pesa y seis ejercicios compuestos para quemar grasa y ganar músculo</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body" style="font-size: 20px; text-align: center">
            <img src="images/ejercicio.jpg" width="100%">
            <br><br>
            La pesa rusa o kettlebell se ha convertido en un accesorio imprescindible para muchos ya que su versatilidad le confiere importantes beneficios en el entrenamiento de fuerza.
            <br>
            Cada vez es más habitual que las pesas rusas o kettlebells, que no son otra cosa que una bola hierro fundido semejante a una bala de cañón, con un asa, sean introducidas en rutinas de entrenamiento de fuerza por constituir un tipo de trabajo físico dinámico, accesible, práctico y adecuado para todo el mundo, que no está exento de beneficios.
            <br>
            Y si además de añadir este elemento a la ecuación, lo empleamos en ejercicios compuestos, que incluyen varios movimientos y activan a la vez diferentes grupos musculares, el éxito de nuestra rutina está asegurado y lograremos desarrollar la masa muscular y quemar grasa de manera más eficiente.
            <br>
            <br>
            <p style="font-weight: bold; color: #6820C4 ; font-size: 25px;">6 ejercicios compuestos con kettlebell</p>
            <ul style="text-align: left">
                <li>Squat + Kick Back</li>
                <li>Peso Muerto + Press Unipodal</li>
                <li>Swing To Lunge</li>
                <li>Arm Complex</li>
                <li>Remo + Peso Muerto</li>
                <li>Torsiones</li>
            </ul>
            <p style="font-weight: bold; color: #6820C4; font-size: 25px;">Cómo hacer la rutina</p>
            
            <ul style="text-align: left">
                <li>Calentar antes de empezar el entrenamiento</li>
                <li>De 12 a 15 repeticiones por ejercicio</li>
                <li>15-30 segundos de descanso entre ejercicio</li>
                <li>3-4 series</li>
                <li>1 o 2 minutos de descanso entre series</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal3" tabindex="-1"  aria-labelledby="modal3" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title titulo-not" style="text-align: center;font-size: 23px" id="modalTitle"><span style="font-size: 32px;">Rutina completa para activarte tras un periodo sin hacer nada</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body" style="font-size: 20px; text-align: center">
            <img src="images/rutina.jpg" width="100%">
            <br><br>
            Ya sea por una cuarentena, una lesión, una enfermedad, estrés, ansiedad, trabajo... la inactividad es peligrosa para tu salud. Por eso tenemos todas las herramientas para activarte.
            <br>
            Hablamos para Deporte y Vida con Joel Mármol, entrenador personal y colaborador de Rebel Gym Madrid, sobre los mejores ejercicios que podemos tras un largo periodo de inactividad física. "Cuando pasamos por largos periodos de inactividad física (ya sea por estilo de vida o por una lesión o enfermedad) debemos enfrentarnos a dos obstáculos. El primer obstáculo, lógicamente será empezar a movernos y crear una adherencia al ejercicio de forma sana, siguiendo una progresión lógica y respetando los principios del entrenamiento", nos cuenta.
            <br><br>
            <p style="font-weight: bold; color: #6820C4 ; font-size: 25px;">Cómo dejar atrás la inactividad física</p>
            <ul style="text-align: left; font-size: 18px;">
                <li>Empieza por ejercicios de baja intensidad (andar, bicicleta, trabajo de fuerza con poco peso (mejor en máquinas al inicio) etc.</li>
                <li>Mejor entrenar poco muchos días que mucho pocos. Para crear una buena adherencia al ejercicio nuestro cuerpo necesita continuidad, si empezamos con demasiada carga de entrenamiento, nuestro cuerpo se fatigará demasiado y, o necesitaremos 2-3 días para recuperarnos, o forzaremos nuestro cuerpo aumentando el riesgo de lesión.</li>
                <li>Busca como punto de partida acumular 10.000 pasos diarios y 10 pisos de altura. Progresa a un mínimo de 15.000 pasos diarios.</li>
                <li>Sigue el principio de repetición y variabilidad: nuestro cuerpo necesita repetir una carga varias veces para acostumbrarse a ella. Una vez pase esto progresa.</li>
                <li>La comida, el descanso y controlar el estrés serán claves para no abandonar antes de tiempo.
                Cuantifica y mide todo lo que haces, no se aconseja subir el volumen de entrenamiento más de un 5-8% cada semana.</li>
            </ul>
            "El segundo obstáculo al cual nos enfrentaremos, será la de controlar nuestra motivación. Por poner un ejemplo, todo el mundo se vuelve loco a principios de año por ponerse en forma y entrenar. Los gimnasios se llenan. Y a principios de marzo, los gimnasios vuelven a estar vacíos. ¿Qué ha pasado?
            <br>
            "Te has pasado de motivado. Has empezado demasiado fuerte, no has disfrutado del entrenamiento y te has quemado “hasta luego Lucas”. No has medido ni cuantificado lo que haces, por tanto, no puedes compararte para ver la mejora y seguir motivándote a conseguir nuevos retos. No tienes bien definido tu objetivo. ¿Qué quieres obtener? ¿Cómo lo vas a medir? ¿Qué fecha limite te has puesto? ¿Qué herramientas tienes para conseguirlo? ¿Es un objetivo real? 
            <br>
            <br>
            <p style="font-weight: bold; color: #6820C4; font-size: 25px;">Ejercicios recomendados tras un periodo de inactividad</p>
            
            <ul style="text-align: left; font-size: 18px;">
                <li>Fuerza: ejercicios globales de tren superior e inferior: Sentadilla, subir escaleras, ejercicios en máquina. Progresa a ejercicios de mayor dificultad, peso muerto, etc.</li>
                <li>Deben repartirse con un 60% de ejercicios que impliquen la parte posterior de tu cuerpo, 40% anterior</li>
                <li>No vas a avanzar si no subes de peso progresivamente</li>
                <li>Acumula el máximo de pasos posibles</li>
                <li>Trabaja tu CORE (abdominales)</li>
                <li>Ve introduciendo ejercicios de alta intensidad de forma progresiva (consulta antes con un profesional).</li>
                <li>Mi recomendación, ponte en contacto con un profesional, cuéntale tu situación y déjate asesorar y prescribir una buena rutina de ejercicios.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal4" tabindex="-1"  aria-labelledby="modal4" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title titulo-not" style="text-align: center;font-size: 23px" id="modalTitle"><span style="font-size: 32px;">8va Carrera Atlética Recreativa 5 km por "Craneosinostosis"</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body" style="font-size: 20px; text-align: center">
            <img src="images/carrera.png" width="100%">
            <br><br>
            <p style="font-weight: bold; color: #6820C4;text-align:right;">
                <br>
                Fecha: 16 de Abril de 2023
                <br>
                Lugar: Estadio Revolución Mexicana, Pachuca, Hidalgo.  
            </p>
            <p style="font-weight: bold">Adquiere tus boletos en <a href="https://www.eventbrite.es/e/entradas-8va-carrera-atletica-recreativa-5-km-por-craneosinostosis-558851518937?aff=ebdssbdestsearch&keep_tld=1">www.eventbrite.es</a></p>
            <br>
            ¡A﻿nimate a participar! Los primeros 400 en inscribirse recibirán una playera y morral.
            <img src="images/playera.png" width="50%" align="center">
            <br>
            <br>
            <p style="font-weight: bold; color: #6820C4; font-size: 20px;">¿Hay algún requisito de ID o límite edad para asistir al evento?</p>
            No hay límite de edad. Existen categorías para todas las edades. Se recomienda llevar alguna identificación para corroborar los datos de la inscripción.  
            <br>
            <br>
            <p style="font-weight: bold; color: #6820C4; font-size: 20px;">¿Debo llevar mi entrada impresa al evento?</p>
            No es necesario llevar la entrada impresa. Se recomienda llevar alguna identificación para corroborar los datos de la inscripción o mostrar el código de inscripción desde tu teléfono para recoger los kits.
            <br>
            <br>
            <p style="font-weight: bold; color: #6820C4; font-size: 20px;">¿Si me inscribo en línea, aun puedo obtener kit?</p>
            Sí, siempre y cuando presentes tu comprobante de pago el día de entrega de Kits (10 y 11 de abril ). 
            <br>
            
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal7" tabindex="-1"  aria-labelledby="modal7" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title titulo-not" style="text-align: center;font-size: 23px" id="modalTitle"><span style="font-size: 32px;">SFL StrongFirst Barbell<br> Certificación de Instructor</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body" style="font-size: 20px; text-align: center">
            <img src="images/entrenador.jpg" width="100%">
            <br>
            <p style="font-weight: bold; color: #6820C4;text-align:right;">
                <br>
                Fecha: 15 de Septiembre de 2023
                <br>
                Lugar: TBD, Ciudad de México, México.  
            </p>
            En nuestra Escuela de Fuerza desmontamos los levantamientos con barra y los volvemos a montar con fuerza. Hemos integrado a la perfección los avances biomecánicos de los laboratorios deportivos rusos, los descubrimientos intuitivos de los mejores entrenadores y levantadores de todo el mundo y los conocimientos de los profesionales médicos. Como resultado, nuestros tacos y progresiones lideran la industria, y la curva de aprendizaje de nuestros alumnos es la más pronunciada. Le prometemos que no ha visto el nivel de atención a la técnica con barra en ninguna otra escuela.
            <br>
            <br>
            Sumérgete en los powerlifts y en varios ejercicios de alto rendimiento con barra:
            <br>
            <br>
            <ul style="text-align: left">
                <li >Sentadilla de espalda</li>
                <li>Press de banca (más variaciones)</li>
                <li>Peso muerto (convencional y sumo)</li>
                <li>Sentadilla frontal</li>
                <li>Sentadilla Zercher</li>
                <li>Buenos días</li>
                <li>Press militar</li>
            </ul>
            La experiencia de nuestros instructores entrenando y asesorando a un amplio abanico de personas, desde teleadictos hasta operadores militares de primer nivel y plusmarquistas mundiales, ha permitido a StrongFirst desarrollar las progresiones de aprendizaje más sólidas de la industria de las planchas. Y tácticas de solución de problemas casi a prueba de fallos para todos los defectos técnicos imaginables, desde los errores groseros de los principiantes hasta las imperfecciones de los veteranos de la plataforma, demasiado sutiles para ser vistas por los ojos de la mayoría de los entrenadores.
            <br>
            El manual del instructor de SFL, repleto de progresiones, indicaciones y consejos profesionales, le servirá tanto y durante tanto tiempo como su pesa de confianza. La sección de programación del manual es igual de potente.
            <br>
            Si este no es su primer rodeo con pesas y marca al menos una de las siguientes casillas, bienvenido a la certificación de instructor de StrongFirst Lifter.
            <br>
            <br>
            <ul style="text-align: left">
                <li>Un entrenador de fuerza comprometido a convertirse en un profesional de clase mundial y hacer que sus atletas ganen</li>
                <li>Un levantador listo para nuevos PRs</li>
                <li>Un atleta en busca de una ventaja en su deporte por ser mucho más fuerte que la competencia</li>
                <li>Un entrenador personal demasiado orgulloso para ofrecer productos de mala calidad, habituales en el sector.</li>
                <li>La Escuela de Fuerza está en marcha.</li>
            </ul>
            <br>
            <p style="font-weight: bold">Visite nuestra página <a href="https://www.strongfirst.com/certifications/sfl-barbell-instructor-information/">StrongFirst Lifter Instructor Certification</a> para más detalles.</p>
            <p style="font-weight: bold">Lea los requisitos para la Certificación de <a href="https://www.strongfirst.com/certifications/sfl-requirements/">Instructor de StrongFirst Lifter</a>.</p>
             
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal5" tabindex="-1"  aria-labelledby="modal5" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title titulo-not" style="text-align: center;font-size: 23px" id="modalTitle"><span style="font-size: 32px;">5 ejercicios compuestos para transformar el cuerpo: gana músculo y quema grasa</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body" style="font-size: 20px; text-align: center">
            <img src="images/ejer8.jpg" width="100%">
            <br><br>
            Los ejercicios compuestos de cardio y fuerza combinan varios movimientos y activan a la vez diferentes grupos musculares, lo que permite aprovechar al máximo el tiempo de entrenamiento.
            <br>
            Si lo que pretendemos es quemar grasa de manera eficiente, lo ideal es optar por rutinas de entreneamiento que combinar ejercicios de fuerza y cardio, enfoque que además permite desarrollar la masa muscular y mejorar las aptitudes cardiovasculares al mismo tiempo. Y no es una recomendación gratuita. Las últimas evidencias científicas confirman que las intervenciones que emplean el ejercicio aeróbico de alta intensidad y el entrenamiento de fuerza de alta carga son más efectivas.
            <br>
            No significa que el entrenamiento exclusivamente de cardio o el de fuerza no sean beneficios, pero la combinación de ambos ofrece mejores resultados para disminuir la adiposidad abdominal, mejorar la masa corporal magra y aumentar la aptitud cardiorespiratoria. Al menos es la principal conclusión de un reciente trabajo de investigadores del University College Dublin (Irlanda) publicado en Obesity Reviews.
            <br>
            <br>
            <p style="font-weight: bold; color: #6820C4 ; font-size: 25px;">5 ejercicios compuestos para transformar el cuerpo</p>
            <ul style="text-align: left">
                <li>Jump Lunge + Kick</li>
                <li>Lateral Plank Raise</li>
                <li>Escalador</li>
                <li>Jumping Lunge Jacks</li>
                <li>Sprint + 1/2 Burpee Jump</li>
            </ul>
            <p style="font-weight: bold; color: #6820C4; font-size: 25px;">Cómo hacer la rutina</p>
            
            <ul style="text-align: left">
                <li>Calentar antes de iniciar el entrenamiento</li>
                <li>Trabajo por ejercicio: 30-45 segundos</li>
                <li>Descanso entre ejercicios: 15 segundos</li>
                <li>Número de rondas: 3-4 rondas</li>
                <li>Descanso entre rondas: 1-2 minutos</li>
                
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal6" tabindex="-1"  aria-labelledby="modal6" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title titulo-not" style="text-align: center;font-size: 23px" id="modalTitle"><span style="font-size: 32px;">"El sueño es el entrenamiento silencioso de los deportistas"</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body" style="font-size: 20px; text-align: center">
            <img src="images/dormir.jpg" width="100%">
            <br><br>
            El sueño adecuado juega un papel fundamental en el rendimiento deportivo, en la recuperación física, fisiológica y metabólica, y en el estado cognitivo y anímico debido a sus efectos reparadores.
            <br>
            Para alcanzar la excelencia en el rendimiento o para mejorar los marcadores de salud, ya sea en el caso de un deportista profesional o aficionado, es conveniente cuidar al milímetro cada detalle y es ahí donde radica la importancia del denominado entrenamiento invisible.
            <br>
            "Cuando hablamos de entrenamiento invisible nos referimos a todo aquello que el deportista hace entre una sesión de ejercicio y otra, y es tan importante como el que realizamos en la pista, en el parque o en el gimnasio”, explica el doctor Juan Antonio Corbalán, director de la Unidad de Salud Deportiva de Vithas Internacional y ex jugador del Real Madrid de baloncesto y de la selección española.
            <br>
            Y uno de los aspectos fundamentales dentro de ese entrenamiento invisible es el que hace referencia al descanso. "El rendimiento deportivo se basa principalmente en el entrenamiento, pero son importantes otros factores como la recuperación física, la preparación psicológica, la nutrición y, por supuesto, el descanso. El sueño es el entrenamiento silencioso de los deportistas", explica por su parte el doctor Eduard Estivill, responsable de las unidades del sueño del Hospital Quirónsalud Vallès y Hospital Universitari General de Catalunya.
            <br>
            Y es que un sueño adecuado juega un papel fundamental en el rendimiento, en la recuperación física, fisiológica y metabólica, y en el estado cognitivo y anímico debido a sus efectos reparadores. "Los viajes, los cambios de horario, la comida, el estrés psicosocial, el uso de dispositivos electrónicos, los horarios de los eventos deportivos, las situaciones de ansiedad y el cansancio después de cada evento ponen al deportista al límite de su resistencia, durmiendo pocas horas, en espacios desconocidos y, seguramente, sin poder descansar adecuadamente debido al agotamiento físico", advierte el especialista
            <br>
            <br>

            <p style="font-weight: bold; color: #6820C4 ; font-size: 25px;">El esfuerzo no garantiza un mejor descanso</p>
            Además, contrariamente a lo que se cree, un gran esfuerzo físico “no significa dormir mejor”. “La falta de descanso supone un desgaste añadido que afecta a la recuperación, el estado emocional y el rendimiento. La gestión del sueño de los deportistas y sus equipos, es crucial y diferencial de cara a conservar el máximo rendimiento y mantener el descanso suficiente para la demanda fisiológica durante la prueba deportiva”, señala el experto.
            <br>
            Por ello no es nada descabellado acudir a un profesional para someterse a estudios de sueño, de ritmos circadianos y de estado neurocognitivo con el objetivo de realizar un plan de sueño, adaptación a las pautas y horarios, y seguimiento del mismo por parte de los deportistas. La finalidad no es otra que conseguir un mejor rendimiento deportivo tanto en deportistas profesionales como amateurs.
      
          </div>
        </div>
      </div>
    </div>

    <?php

        include('foot.php');
    ?>
</body>
</html>