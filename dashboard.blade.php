        <!-- ===== Dashboard Start ===== -->
        <section style="padding-top: 90px;" class="i gj qp gr hj rp hr">
            <div class="d-none d-lg-block">
                <img style="margin-bottom: 200px;" src="assets/images/shape-11.svg" alt="Shape" class="of h ga ha ke">
                <img style="margin-top: 200px;left:90px;" src="assets/images/shape-14.svg" alt="Shape" class="h ja ka">
                <img style="margin-top: 200px;" src="assets/images/shape-07.svg" alt="Shape" class="h ia o ae jf">
                <img style="margin-bottom: 200px;" src="assets/images/shape-15.svg" alt="Shape" class="h q p">
            </div>

            <div class="bb ze ki xn 2xl:ud-px-0">
                <div class="tc sf yo zf kq overflow-hidden">
                    <div class="col-lg-6 col-12 mx-auto me-0 rounded-0">
                        <ul style="max-width: 100%;overflow-x:auto;"
                            class="zijdebar list-group list-group-horizontal contacts-box rounded-0 mb-3">

                            @foreach ($users as $user)
                                <li
                                    class="wm animate_top list-group-item border-0 bg-transparent pt-2 pe-0 text-center">
                                    <div class="mb-0">
                                        @if ($user->photoUrl())
                                            <img class="contacts rounded-circle border border-3 border-success"
                                                src="{{ $user['profile_photo_url'] }}" />
                                        @else
                                            <img class="contacts rounded-circle border border-3 border-success"
                                                src="{{ Storage::url($user->profile_photo_path) }}" />
                                        @endif
                                    </div>
                                    <small>{{ $user['name'] }}</small>
                                </li>
                            @endforeach

                        </ul>
                        <style>
                            .feeds{
                                max-height: 400px;
                                overflow-y:auto;
                            }
                            @media(max-width:600px;){
                                .feeds{
                                    max-height: 640px;
                                }
                            }
                        </style>

                        <div class="feeds row zijdebar px-3">
                            <i class="header-icon fa-regular fa-square-plus wm px-2 float-right" role="button" data-bs-toggle="modal" data-bs-target="#newFeed"></i>

                            @foreach ($feeds as $feed)
                            <div class="my-3 animate_top sg vk rm xm" data-sr-id="1"
                            style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: all, opacity 2.8s cubic-bezier(0.5, 0, 0, 1), transform 2.8s cubic-bezier(0.5, 0, 0, 1);">
                           @if($feed['file'])
                            <div class="c rc i z-1 pg">
                                <img class="w-100" src="{{ Storage::url($feed['file']) }}" alt="lol">

                            </div>
                            @endif

                            <div class="yh">
                                <div class="d-flex justify-content-between tc uf wf ag jq">
                                    <div class="tc wf ag">
                                        <img src="assets/images/icon-man.svg" alt="User">
                                        <p>{{ $feed['name'] }}</p>
                                    </div>
                                    <div class="tc wf ag">
                                        <img src="assets/images/icon-calender.svg" alt="Calender">
                                        <p>{{ date('D d M Y H:i', strtotime($feed['created_at'])) }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between bg-transparent  py-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-regular fa-heart "></i>
                                        <i class="fa-regular fa-comment  mx-3"></i>
                                        <i class="fa-regular fa-paper-plane "></i>
                                    </div>
                                    <div>
                                        <i class="fa-regular fa-bookmark "></i>
                                    </div>
                                </div>
                                @if($feed['content'])
                                <h4 class="ek tj ml il kk wm xl eq lb">
                                    <a href="blog-single.html">{{ $feed['content'] }}</a>
                                </h4>
                                {{ $feed['created_at']->diffforHumans() }}
                                @endif
                            </div>
                        </div>
                            @endforeach

                        </div>
                    </div>

                    <!--Sidebar-->
                    <div class=" jn/2 so ms-0">

                        <div class="animate_top mt-2">

                            <div>
                                <div class="dropdown tc fg 2xl:ud-gap-5 qb">
                                    @if ($currentUser->photoUrl())
                                        <img style="width:80px;height:80px;" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false" class="rounded-circle border border-3 border-success"
                                            src="{{ $currentUser['profile_photo_url'] }}" />
                                    @else
                                        <img style="width:80px;height:80px;" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false" class="rounded-circle border border-3 border-success"
                                            src="{{ Storage::url($currentUser['profile_photo_path']) }}" />
                                    @endif
                                    <h5 class="wm kk xl bn ml il">
                                        <a class="wm text-decoration-none" href="#">ali993366 <br><small
                                                class="wm">{{ $currentUser['name'] }}</small></a>
                                    </h5>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('profile.show') }}">Instellingen</a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf

                                                <x-dropdown-link style="font-size: 16px;" class="dropdown-item ps-3"
                                                    href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </li>
                                    </ul>

                                </div>
                                <h5 class="wm mb-2 ms-1">Suggesties voor jou</h5>
                                <div class="tc fg 2xl:ud-gap-6 qb mx-auto ms-2">
                                    <img style="width:60px;height:60px;" class="rounded-circle"
                                        src="assets/images/blog-small-02.png" />
                                    <h6 class="wm kk xl bn ml il">
                                        <a class="wm text-decoration-none" href="#">ali993366 <br><small
                                                class="wm">Ali Yuzbasioglu</small></a>
                                    </h6>
                                </div>
                                <div class="tc fg 2xl:ud-gap-6 qb mx-auto ms-2">
                                    <img style="width:60px;height:60px;" class="rounded-circle"
                                        src="assets/images/blog-small-02.png" />
                                    <h6 class="wm kk xl bn ml il">
                                        <a class="wm text-decoration-none" href="#">ali993366 <br><small
                                                class="wm">Ali Yuzbasioglu</small></a>
                                    </h6>
                                </div>

                            </div>

                        </div>

                    </div>
                    <!--End Sidebar-->
                </div>
            </div>
            <!--Modal-->
            <div style="margin-top: 100px;" class="modal fade" id="newFeed">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header d-flex justify-content-between">
                            <h4 class="modal-title">Modal Heading</h4>
                            <i role="button" class="fa fa-close border p-2 mb-3 float-end"
                                data-bs-dismiss="modal"></i>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            @if (session('succes'))
                            <div class="notification-toast bg-white text-dark">
                                <button class="toast-close-btn" data-toast-close>
                                    <i class="sluit fa-sharp fa-solid fa-rectangle-xmark" name="close-outline"></i>
                                </button>
                                <div class="toast-detail">
                                    <p class="toast-message text-dark">
                                        {{ session('succes') }}
                                    </p>
                                </div>
                            </div>
                        @endif
                            <h4 class="kk tj ec">Nieuw Bericht</h4>
                            <p class="ac qe">Maak een bericht met foto</p>
                            <div wire:loading wire:target="bestand">Uploading...</div>

                            @if($this->bestand)
                                    <img class="rounded m-0 p-0"
                                        style="height: 30px;" src="{{ $this->bestand->temporaryUrl() }}">

                                <br>
                                <button wire:click="$cancelUpload('bestand')"
                                    class="btn btn-outline-primary btn-sm mt-1">annuleer</button>
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                        @endif
                            <form class="" wire:submit="save">
                                @if ($bestand)
                                <img src="{{ $bestand->temporaryUrl() }}">
                            @endif
                                @error('bestand')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                                <div class="d-flex align-items-center i mb-4">
                                    <input wire:model="feed" type="text" placeholder="Bericht..."
                                        class="vd sm _g ch pm vk xm rg gm dm dn gi mi" />

                                    <label class="h q fi" for="fileUpload" role="button">
                                        <i class="fa fa-paperclip">
                                            <input wire:model="bestand" id="fileUpload" type="file" hidden>
                                        </i>
                                    </label>
                                </div>
                                <div class="modal-footer">
                                    <div wire:loading class="spinner-border spinner-border-sm" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <button type="submit" class="">Stuur Bericht</button>
                                </div>

                            </form>
                        </div>

                        <!-- Modal footer -->

                    </div>
                </div>
            </div>
            <!--End Modal-->

        </section>
        <!-- ===== Dashboard End ===== -->
