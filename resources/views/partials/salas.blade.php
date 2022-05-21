<table>
    <thead>
        <tr>
            <th></th>
            @php
                $count = 0;

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

            foreach ($places as $place) {
                echo '<tr>';
                if (!strcmp($aux, $place->fila) == 0) {
                    echo '<th>' . $place->fila . '</th>';
                    for ($j = 0; $j < $count; $j++) {
                        echo '<td>';
                        echo "<form method='GET' action='" .
                '/purchase/' .
                $filme->id .
                '/' .
                $sessao->id .
                "'>
                            <input type='hidden' value='" .
                $nPlaces .
                "' name='nPlaces'>
                            <input type='hidden' value='A2' name='sit'>
                            ";
                        echo '<button class="btn-place" type="submit">
                                <i class="fas fa-couch cinema-seats"></i>
                            </button> </form>';
                        echo '</td>';
                    }
                }
                $aux = $place->fila;
                echo '</tr>';
            }
        @endphp


    </tbody>
</table>
