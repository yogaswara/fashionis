<div class="container">
    <div class="row mp no-rutter">
        <div class="advertising">
            @foreach(horizontal_banner() as $banners)
            <div class="col-sm-12">
                <a href="{{url($banners->url)}}">
                    {{HTML::image(banner_image_url($banners->gambar), 'Info Promo', array('width'=>'1168', "class"=>"img-responsive"))}}
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="footer">
    <div class="container">
        <div class="row mp no-rutter">
            <div class="footer-support">
                @if(count(random_testimonial(4)) > 0)
                <div class="header-support">
                    <h1>Testimonial</h1>
                    <div class="row">
                        @foreach(random_testimonial(4) as $testimonial)
                        <div class="col-sm-3">
                            <div class="content-support">
                                <div class="description">
                                    <p id="footertesti"><i class="fa fa-user"></i> <strong>{{short_description($testimonial->nama,25)}}</strong></p>
                                    <blockquote>{{short_description($testimonial->isi,110)}}</blockquote>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <a href="{{url('testimoni')}}" class="link-more-testimonial">Lihat Semua</a>
                    </div>
                </div>
                @endif

                <div class="content-support">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="content-footer-child">
                                <h3>Tentang Kami</h3>
                                <p>{{short_description(about_us()->isi,400)}}</p>
                            </div>
                        </div>
                        @foreach(all_menu() as $key=>$menu)
                            @if($key == '2')
                            <div class="col-sm-3">
                                <div class="content-footer-child">
                                    <h3>{{$menu->nama}}</h3>
                                    <ul>
                                        @foreach($menu->link as $link_menu)
                                        @if($menu->id == $link_menu->tautanId)
                                        <li>
                                            <a href="{{menu_url($link_menu)}}">{{$link_menu->nama}}</a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                        @endforeach
                        
                        <div class="col-sm-4">
                            <div class="content-footer-child">
                                <h3>Hubungi Kami</h3>
                                <p>{{@$kontak->alamat}}</p>
                                <p>Telepon : {{!empty($kontak->telepon) ? $kontak->telepon : '-'}}</p>
                                <p>HP : {{!empty($kontak->hp) ? $kontak->hp : '-'}}</p>
                                <div class="social-media">
                                    @if(!empty($kontak->fb))
                                    <a href="{{url($kontak->fb)}}" target="_blank">
                                        <span class="icon-sm" title="Facebook"><i class="fa fa-facebook icn"></i></span>
                                    </a>
                                    @endif
                                    @if(!empty($kontak->tw))
                                    <a href="{{url($kontak->tw)}}" target="_blank">
                                        <span class="icon-sm" title="Twitter"><i class="fa fa-twitter icn"></i></span>
                                    </a>
                                    @endif
                                    @if(!empty($kontak->gp))
                                    <a href="{{url($kontak->gp)}}" target="_blank">
                                        <span class="icon-sm" title="Google Plus"><i class="fa fa-google-plus icn"></i></span>
                                    </a>
                                    @endif
                                    @if(!empty($kontak->pt))
                                    <a href="{{$kontak->pt}}" target="_blank">
                                        <span class="icon-sm" title="Pinterest"><i class="fa fa-pinterest icn"></i></span>
                                    </a>
                                    @endif
                                    @if(!empty($kontak->ig))
                                    <a href="{{url($kontak->ig)}}" target="_blank">
                                        <span class="icon-sm" title="Instagram"><i class="fa fa-instagram icn"></i></span>
                                    </a>
                                    @endif
                                    @if(!empty($kontak->tl))
                                    <a href="{{url($kontak->tl)}}" target="_blank">
                                        <span class="icon-sm" title="Tumblr"><i class="fa fa-tumblr icn"></i></span>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <div class="row">
                        <div class="col-xs-12 center">
                            @if(!empty($bank))
                                @foreach(list_banks() as $value)
                                <img src="{{bank_logo($value)}}" alt="{{$value->bankdefault->nama}}" title="{{$value->bankdefault->nama}}">
                                @endforeach
                            @endif
                            @foreach(list_payments() as $pay)
                                @if($pay->nama == 'ipaymu' && $pay->aktif == 1)
                                <img src="{{url('img/bank/ipaymu.jpg')}}" alt="ipaymu" title="Ipaymu" />
                                @endif
                                @if($pay->nama == 'bitcoin' && $pay->aktif == 1)
                                <img src="{{url('img/bitcoin.png')}}" alt="bitcoin" title="Bitcoin" />
                                @endif
                                @if($pay->nama == 'paypal' && $pay->aktif == 1)
                                <img src="{{url('img/bank/paypal.png')}}" alt="paypal" title="Paypal" />
                                @endif
                            @endforeach
                            @if(count(list_dokus()) > 0 && list_dokus()->status == 1)
                            <img src="{{url('img/bank/doku.jpg')}}" alt="doku myshortcart" title="Doku" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-author">
            <p>&copy; {{ short_description(Theme::place('title'),80) }} {{date('Y')}} All Right Reserved. Powered by <a class="nodecor" target="_blank" href="http://jarvis-store.com">Jarvis Store</a></p>
        </div>
    </div>
</div>
{{pluginPowerup()}}