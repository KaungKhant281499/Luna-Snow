<footer class="footer">
    <div class="container">
        <nav class="float-left">
        <ul>
            <li>
            <a href="{{ route('welcome') }}">
                {{ __('Go To Your Dashboard') }}
            </a>
            </li>
            <li>
            <a href="{{ route('about') }}">
                {{ __('About Us') }}
            </a>
            </li>
            <li>
            <a href="{{ route('auctions') }}">
                {{ __('Auctions') }}
            </a>
            </li>
            <li>
            <a href="{{ route('contact') }}">
                {{ __('Contact Us') }}
            </a>
            </li>
        </ul>
        </nav>
        <div class="copyright float-right">
        &copy;
        <script>
            document.write(new Date().getFullYear())
        </script>, copyright by LUNA SNOW Co Ltd.
    </div>
</footer>