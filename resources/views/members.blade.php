@php use Illuminate\Support\Facades\Session; @endphp
<h1>Members</h1>
<a href="/">Home</a>
<a href="/about">About</a>
<br/>
<br/>
<form action="save-member" method="post">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" autofocus>
    <br/>
    <br/>
    <label for="name">Email</label>
    <input type="email" name="email">
    <br/>
    <br/>
    <button type="submit">Save</button>
</form>

@if(Session::has('errors'))
    @foreach(Session::get('errors')->all() as $error)
        <span style="color: red">{{ $error }}</span>
        <br />
    @endforeach
@endif

<table width="50%" border="1px solid black">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
    </tr>
    @foreach($members as $member)
        <tr>
            <td>{{$member->getKey()}}</td>
            <td>{{$member->name}}</td>
            <td>{{$member->email}}</td>
        </tr>
    @endforeach
</table>
