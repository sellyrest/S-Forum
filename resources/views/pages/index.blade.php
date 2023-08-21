@extends('layouts.main')
@section('styles')
    <style>
        .name {
            margin-left: 70px;
            color: #000;
            margin-top: -50px;
            font-size: 17px;
        }

        .time {
            margin-left: 70px;
            font-size: 13px;
        }

        .role {
            color: #B59DD1;
        }

        .content {
            color: #000;
            font-size: 15px;
        }
    </style>
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center" id="load-icon" style="display: none">
                <img src="{{ asset('img/load.gif') }}" alt="" width="50px">
            </div>
            <div class="col-xl-8 col-lg-5" id="content-topic">
                <div class="infinity-scroll">
                    @foreach ($topic as $item)
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold role">UI/UX Designer</h6>
                            </div>
                            <div class="card-body">
                                <img style="height :60px; "
                                    src="{{ $item->user->foto ? asset('img/profile/' . $item->user->foto) : asset('img/profile/default_fp.jpg') }}"
                                    alt="">
                                <h5 class="name">{{ $item->user->fullname }}</h5>
                                <p class="time">{{ date('d F Y', strtotime($item->updated_at)) }}</p>
                                <h4 class="title">{{ $item->title }}</h4>
                                <p class="content">{{ $item->content }}</p>
                                <div class="text-center">
                                    <img src="{{ asset('img/' . $item->image) }}" alt="" class="img-fluid">
                                </div>


                                <button
                                    class="p-2 justify-content-center my-3"style="text-decoration: none; background-color: #8A7EA4; color: #fff; border-color:#fff ;border-radius: 10px; font-size: 15px;"
                                    data-toggle="modal" data-target="#commentModal">Add Response</button>
                                    <a href="{{ route('topic.show', Crypt::encrypt($item->id))}}" style="color: #C794B0; margin-left: 62%; margin-top: -50px">see all
                                    response</a>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="commentModal" tabindex="-1" role="dialog"
                                aria-labelledby="commentModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="commentModalLabel">Respons</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="commentTitle">Judul</label>
                                                <input type="text" class="form-control" id="commentTitle" name="commentTitle"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                Respons</label>
                                                <textarea class="form-control" id="commentContent" name="commentContent" rows="5" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="button" class="btn btn-primary">Kirim</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $topic->appends($_GET)->links()}}
                </div>
            </div>
            <div class="col-xl-4 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-body text-center card-profile">
                        <h3>Account</h3>
                        <hr>
                        </hr>
                        <div class="text-center pt-4 pb-2">
                            <img src="{{ Auth::user()->foto ? asset('img/profile/' . Auth::user()->foto) : asset('img/profile/default_fp.jpg') }}"
                                alt="">
                            <div class="py-3">
                                <h5>{{ Auth::user()->name }}</h5>
                            </div>
                            <div class="contact">
                                <h5>contact</h5>
                            </div>
                            <label>Email: </label>
                            <a href="mailto:{{ Auth::user()->email }}">
                                {{ Auth::user()->email }}
                            </a><br />
                            <label>Phone: </label>
                            <a href="tel:+6288983879406">
                                088983879406
                            </a> <br />
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body card-profile">
                        <h3 style="text-center">Attendence</h3>
                        <div class="text-left pt-1 pb-2">
                            <hr>
                            </hr>
                            <div class="py-3">
                                <img style="height :60px; " src="img/Marettha.png" alt="">
                                <h5 style="margin-left: 70px; color:#7E6F6F; margin-top: -40px; font-size: 17px;">Marettha
                                    Angelina</h5>
                            </div>
                            <div class="py-3">
                                <img style="height :60px; " src="img/alex.png" alt="">
                                <h5 style="margin-left: 70px; color:#7E6F6F; margin-top: -40px; font-size: 17px;">Alexxandra
                                    Pasha</h5>
                            </div>
                            <div class="py-3">
                                <img style="height :60px; " src="img/leonna.png" alt="">
                                <h5 style="margin-left: 70px; color:#7E6F6F; margin-top: -40px; font-size: 17px;">Leonna
                                    Lea</h5>
                            </div>
                            <div class="py-3">
                                <img style="height :60px; " src="img/chella.png" alt="">
                                <h5 style="margin-left: 70px; color:#7E6F6F; margin-top: -40px; font-size: 17px;">Christy
                                    Alveria</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






    </div>
    <!-- End of Content Wrapper -->
@endsection
@section('scripts')
<script>
    $(function () {
        $('ul.pagination').hide();
        $('.infinity-scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<img src="/img/load.gif" alt="" width="50px">',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinity-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }

        })
    });
</script>
@endsection
