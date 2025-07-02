<ul class="side-menu">
    <li>
        <a href="#">
            <i class='bx bxs-cog' ></i>
            <span class="text">Settings</span>
        </a>
    </li>
    <li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="#" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class='bx bxs-log-out-circle' ></i>
            <span class="text">Logout</span>
        </a>
    </li>
</ul>
