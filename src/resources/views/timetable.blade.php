<h2>月曜日の授業</h2>
<table>
    @foreach ($monday as $c)
        <tr>
            <td>{{ $c->period }}</td>
            <td>{{ $c->name }}</td>
            <td>{{ $c->teacher }}</td>
            <td>{{ $c->room }}</td>
        </tr>
    @endforeach
</table>

<h2>必修科目</h2>
<table>
    @foreach ($required as $c)
        <tr>
            <td>{{ $c->name }}</td>
            <td>{{ $c->credits }}</td>
        </tr>
    @endforeach
</table>