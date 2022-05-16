<table>
    <thead>
        <tr>
            <th></th>
            @php
                $aux = '';
                $count = 0;

                foreach ($places as $place) {
                    if (!strcmp($aux, $place->fila) == 0) {
                        echo '<th>' . $place->fila . '</th>';
                        $count++;
                    }

                    $aux = $place->fila;
                }
            @endphp
        </tr>
    </thead>
    <tbody>
        @for ($i = 0; $i < $cols; $i++)
            <tr>
                <th>
                    {{ $i + 1 }}
                </th>
                @for ($j = 0; $j < $count; $j++)
                    <td>
                        Puesto
                    </td>
                @endfor
            </tr>
        @endfor
    </tbody>
</table>
