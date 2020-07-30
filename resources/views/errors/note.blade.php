@if(Session::has('error'))
<tr>
    <td colspan="2" class="alert-danger">
        {{Session::get('error')}}
    </td>
</tr>
@endif