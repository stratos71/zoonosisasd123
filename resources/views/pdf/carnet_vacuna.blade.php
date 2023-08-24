<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Card</title>
    <link rel="stylesheet" href="{{ public_path() . '/bootstrap.min.css' }}">
</head>

<body style="display: flex; justify-content: center; align-items: center; margin: 0;">
    <div style="width: 500px; height: auto; background-color: #b6d7a8; position: relative;">
        <img src="{{ public_path() . '/img/logo_escudo.png' }}"
            style="width: 100px; height: 100px; position: absolute; top: 10px; left: 10px;">
        <img src="{{ public_path() . '/img/logo_gamea.png' }}" alt="Imagen 2"
            style="width: 100px; height: 100px; position: absolute; top: 10px; right: 10px;">

        <h6 style="color: #2b78e4; font-size: 0.8rem;" class="text-center mt-3"><b>
                GOBIERNO AUTONOMO MUNICIPAL DE EL ALTO
                <br>
                SECRETARIA DE SALUD
                <br>
                DIRECCIÓN DE GESTIÓN EN SALUD
                <br>
                ÁREA ZOONOSIS
            </b></h6>
        <h5 style="color: #cf2a27;" class="text-center"><b>Comprobante de Vacunación</b></h5>
        <h6 style="color: #fff;" class="text-center"><b style="background-color: #2b78e4;">CANINA/FELINA</b></h6>
        <hr>
        <h6 style="color: #cf2a27;" class="text-center"><b>DATOS DEL PROPIETARIO(A)</b></h6>

        <table style="padding: 10px" width="100%">
            <tr>
                <td width="25%" style="font-weight: bold;">
                    Propietario(a):
                </td>
                <td width="75%" style="word-wrap: break-word; background-color: white; font-weight: bold;">
                    <span>{{ $vacuna->animal->propietario->nombres }}
                        {{ $vacuna->animal->propietario->apellido_paterno }}
                        {{ $vacuna->animal->propietario->apellido_materno }}</span>
                </td>
            </tr>
        </table>

        <table width="100%" style="padding: 10px">
            <tr>
                <td width="20%" style="font-weight: bold;">
                    Dirección:
                </td>
                <td width="80%" style="word-wrap: break-word; background-color: white; font-weight: bold;">
                    {{ $vacuna->animal->propietario->direccion }}
                </td>
            </tr>
        </table>
        <table width="100%" style="padding: 10px">
            <tr>
                <td style="font-weight: bold; white-space: nowrap;">
                    Distrito:
                    <span style="padding: 5px; background-color: white; font-weight: bold; white-space: nowrap;">
                        {{ $vacuna->animal->propietario->distrito }}
                    </span>
                </td>
                <td style="font-weight: bold; white-space: nowrap;">
                    Nº de Domicilio:
                    <span style="padding: 5px; background-color: white; font-weight: bold; white-space: nowrap;">
                        {{ $vacuna->animal->propietario->nro_domicilio }}
                    </span>
                </td>
                <td style="font-weight: bold; white-space: nowrap;">
                    Tel/Cel:

                    <span style="padding: 5px; background-color: white; font-weight: bold; white-space: nowrap;">
                        {{ $vacuna->animal->propietario->celular }}
                    </span>
                </td>
            </tr>
        </table>
        <hr>
        <h6 style="color: #cf2a27;" class="text-center"><b>DATOS DE LA MASCOTA</b></h6>
        <table width="100%" style="padding: 10px">
            <tr>
                <td style="font-weight: bold; white-space: nowrap;">
                    Especie:
                </td>
                <td style="font-weight: bold; white-space: nowrap;">
                    Canina
                    <span style="padding: 5px; background-color: white; font-weight: bold; white-space: nowrap;">
                        @if ($vacuna->animal->especie->nombre == 'Canina')
                            X
                        @else
                            &nbsp;
                        @endif
                    </span>
                </td>
                <td style="font-weight: bold; white-space: nowrap;">
                    Felina
                    <span style="padding: 5px; background-color: white; font-weight: bold; white-space: nowrap;">
                        @if ($vacuna->animal->especie->nombre == 'Felina')
                            X
                        @else
                            &nbsp;
                        @endif
                    </span>
                </td>
            </tr>
        </table>
        <table width="100%" style="padding: 10px">
            <tr>
                <td width="20%" style="font-weight: bold;">
                    Nombre:
                </td>
                <td width="40%" style="word-wrap: break-word; background-color: white; font-weight: bold;">
                    {{ $vacuna->animal->nombre }}
                </td>
                <td width="10%" style="font-weight: bold;">
                    Raza:
                </td>
                <td width="30%" style="word-wrap: break-word; background-color: white; font-weight: bold;">
                    {{ $vacuna->animal->raza }}
                </td>
            </tr>
        </table>
        <table width="100%" style="padding: 10px">
            <tr>
                <td style="font-weight: bold; white-space: nowrap;">
                    Edad:
                    <span style="padding: 5px; background-color: white; font-weight: bold; white-space: nowrap;">
                        {{ $vacuna->animal->edad }}
                    </span>
                </td>
                <td style="font-weight: bold; white-space: nowrap;">
                    Color:
                    <span style="padding: 5px; background-color: white; font-weight: bold; white-space: nowrap;">
                        {{ $vacuna->animal->color }}
                    </span>
                </td>
                <td style="font-weight: bold; white-space: nowrap;">
                    Tamaño:
                    <span style="padding: 5px; background-color: white; font-weight: bold; white-space: nowrap;">
                        {{ $vacuna->animal->tamaño }}
                    </span>
                </td>
            </tr>
        </table>
        <table width="100%" style="padding: 10px">
            <tr>
                <td style="font-weight: bold; white-space: nowrap;">
                    Hembra:

                    <span style="padding: 5px; background-color: white; font-weight: bold; white-space: nowrap;">
                        @if ($vacuna->animal->genero == 'HEMBRA')
                            X
                        @else
                            &nbsp;
                        @endif
                    </span>
                </td>
                <td style="font-weight: bold; white-space: nowrap;">
                    Macho:

                    <span style="padding: 5px; background-color: white; font-weight: bold; white-space: nowrap;">
                        @if ($vacuna->animal->genero == 'MACHO')
                            X
                        @else
                            &nbsp;
                        @endif
                    </span>
                </td>
                <td style="font-weight: bold; white-space: nowrap;">
                    Esterilizado:
                </td>
                <td style="font-weight: bold; white-space: nowrap;">
                    SI:

                    <span style="padding: 5px; background-color: white; font-weight: bold; white-space: nowrap;">
                        @if ($vacuna->animal->esterilizado == 'SI')
                            X
                        @else
                            &nbsp;
                        @endif
                    </span>
                </td>
                <td style="font-weight: bold; white-space: nowrap;">
                    NO:
                    <span style="padding: 5px; background-color: white; font-weight: bold; white-space: nowrap;">
                        @if ($vacuna->animal->esterilizado == 'NO')
                            X
                        @else
                            &nbsp;
                        @endif
                    </span>
                </td>
            </tr>
        </table>
        <hr>
        <h6 class="text-center"><b>LEY 700 para la defensa de Animales contra actos de Crueldad y Maltrato</b></h6>
        <table width="100%" style="padding: 10px">
            <tr>
                <td width="40%" style="font-weight: bold;">
                    Fecha de Vacunación:
                </td>
                <td width="60%" style="word-wrap: break-word; background-color: white; font-weight: bold;">
                    {{ $vacuna->created_at->format('d-m-Y') }}
                </td>
            </tr>
        </table>
        <table width="100%" style="padding: 10px">
            <tr>
                <td width="40%" style="font-weight: bold;">
                    Nombre del Vacunador:
                </td>
                <td width="60%" style="word-wrap: break-word; background-color: white; font-weight: bold;">
                    {{ $vacuna->usuario->nombre_completo }}
                </td>
            </tr>
        </table>
        <hr>
        <h6 class="text-center"><b>ORDENANZA MUNICIPAL 165/06 Art.10 (del dueño)
                <br>
                No abandonar el can en vías públicas
                <br>
                Art. 91 (de las sanciones) infracciones muy graves
                <br>
                multa de 501 a 2000 BS.
            </b>
        </h6>
        <h3 class="text-center" style="color: #2b78e4;"><b>
                Número de Carnet
                <span style="background-color: #00ffff; color: black;">{{ $vacuna->nro_carnet }}</span>
            </b>
        </h3>
        <div style="background-color: #cf2a27; height: 20px;">
        </div>
    </div>
</body>

</html>
