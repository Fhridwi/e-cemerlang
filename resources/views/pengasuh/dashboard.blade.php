<h1>Dashboard pengasuh</h1>

<form id="logout-form" action="{{ route('logout') }}" method="POST" >
    @csrf
    <button>Logout</button>
</form>