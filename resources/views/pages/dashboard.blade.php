<div>
    {{-- The Master doesn't talk, he acts. --}}
    <h1>Dashboard</h1>
    {{ Auth::user()->getAllPermissions() }}
</div>
