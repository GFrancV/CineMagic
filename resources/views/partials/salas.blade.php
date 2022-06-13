<div>
    <div class="disponivel"></div> -> Disponivel
    <br>
    <br>
    <div class="usado"></div> -> Usado
</div>
<br>
<table>
    <thead>
        <tr>
            <th></th>
            @php
                $count = 0;
                $auxPaint = $nPlaces;
                $auxActive = false;

                for ($i = 0; $i < $cols; $i++) {
                    $aux = $i + 1;
                    echo '<th>';
                    echo $aux;
                    echo '</th>';
                    $count++;
                }
            @endphp

        </tr>
    </thead>
    <tbody>
        @php
            $aux = '';
            foreach ($places as $placeAux) {
                $lugar_id = $placeAux->id;
                break;
            }

            foreach ($places as $place) {
                echo '<tr>';
                if (!strcmp($aux, $place->fila) == 0) {
                    echo '<th>' . $place->fila . '</th>';
                    for ($j = 0; $j < $count; $j++) {
                        echo '<td>';
                        echo "<form method='GET' action='/purchase/" . $filme->id . '/' . $sessao->id . "'>";
                        echo "<input type='hidden' name='nPlaces' value='" . $nPlaces . "' >";
                        echo "<input type='hidden' name='row' value='" . $place->fila . "' >";
                        echo "<input type='hidden' name='col' value='" . $j + 1 . "' >";
                        foreach ($places as $placeAux) {
                            if (strcmp($placeAux->fila, $place->fila) == 0 && strcmp($placeAux->posicao, $j + 1) == 0) {
                                echo "<input type='hidden' name='lugar_id' value='" . $placeAux->id . "' >";
                            }
                        }

                        //Paint the selected place
                        if ($place->fila . $j + 1 == app('request')->input('row') . app('request')->input('col')) {
                            echo '<button class="btn-place-active" type="submit">
                                    <i class="fas fa-couch cinema-seats"></i>
                                </button> </form>';
                            $auxActive = true;
                            $auxPaint = $auxPaint - 1;
                        } else {
                            $auxSitUsed = 0;
                            if ($auxActive && $auxPaint > 0) {
                                echo '<button class="btn-place-active" type="submit">
                                            <i class="fas fa-couch cinema-seats"></i>
                                        </button> </form>';
                                $auxPaint = $auxPaint - 1;
                                $auxSitUsed = 1;
                            } elseif (isset($bilhetes)) {
                                foreach ($bilhetes as $bilhete) {
                                    if ($bilhete->lugar_id == $lugar_id) {
                                        echo '<button class="btn-place-active" type="submit" disabled>
                                                    <i class="fas fa-couch cinema-seats"></i>
                                                </button> </form>';
                                        $auxSitUsed = 1;
                                        break;
                                    }
                                }
                            }
                            if (!$auxSitUsed) {
                                echo '<button class="btn-place" type="submit">
                                        <i class="fas fa-couch cinema-seats"></i>
                                        </button> </form>';
                            }
                        }
                        echo '</td>';
                        $lugar_id++;
                    }
                }
                $aux = $place->fila;
                echo '</tr>';
            }
        @endphp


    </tbody>
</table>
