<h1>Members</h1>
<a href="/">Home</a>
<a href="/about">About</a>
<br/>
<br/>
<form method="post" onsubmit="saveMember(event)">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" id="name" autofocus>
    <br/>
    <br/>
    <label for="name">Email</label>
    <input type="email" name="email" id="email">
    <br/>
    <br/>
    <button type="submit">Save</button>
</form>

@if(Session::has('errors'))
    @foreach(Session::get('errors')->all() as $error)
        <span style="color: red">{{ $error }}</span>
        <br/>
    @endforeach
@endif

<table width="50%" border="1px solid black">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <tbody id="members_grid">

    </tbody>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.8.4/axios.min.js"
        integrity="sha512-2A1+/TAny5loNGk3RBbk11FwoKXYOMfAK6R7r4CpQH7Luz4pezqEGcfphoNzB7SM4dixUoJsKkBsB6kg+dNE2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    async function loadMembers() {
        const {data} = await axios.get('api/load-members')

        let members = [];
        data.members.forEach((member, index) => {
            let link = `<a href='delete-member/${member.id}' class='delete-member'>delete</a>`
            members.push(`<tr><td>${index + 1}</td><td>${member.name}</td><td>${member.email}</td><td>${link}</td></tr>`)
        })

        $("#members_grid").html(members)
    }

    loadMembers()

    async function saveMember(e) {
        e.preventDefault()

        let name = $("#name");
        let email = $("#email");

        await axios.post('save-member', {
            name: name.val(),
            email: email.val(),
        })

        name.val('')
        email.val('')
        name.focus()

        loadMembers()
    }

    $("body").on('click', '.delete-member', async function (e) {
        e.preventDefault()

        await axios.get(e.target.attributes.href.value)

        loadMembers()
    })
</script>
