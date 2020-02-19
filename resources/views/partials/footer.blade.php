@inject('usersBrowserService','\App\Services\UsersBrowserService)
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Blog 2019</p>
        <ul class="list-group">
            @foreach($usersBrowserService->getAllBrowser() as $browser => $count)
                <li class="list-group-item d-flex justify-content-between align-items-center ">
                    {{ $browser }}
                    <span class="badge badge-primary badge-pill">{{ $count }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</footer>
