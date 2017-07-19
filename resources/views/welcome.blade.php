@extends('layouts.app')

@section('content')
    <div class="container-fill">
        <div id="slides">
            <ul class="slides-container">
                <li>
                    <img src="https://placeimg.com/1000/800/nature" alt="">
                    <div class="banner-container">
                        <h1>Invest in Life.</h1>
                        <p>
                            Description about the project can be placed here
                        </p>
                    </div>
                </li>
                <li>
                    <img src="https://placeimg.com/1000/800" alt="">
                    <div class="banner-container">
                        <h1>Invest in Life.</h1>
                        <p>
                            Description about the project can be placed here
                        </p>
                    </div>
                </li>
                <li>
                    <img src="https://placeimg.com/1000/800/tech" alt="">
                    <div class="banner-container">
                        <h1>Invest in Life.</h1>
                        <p>
                            Description about the project can be placed here
                        </p>
                    </div>
                </li>
            </ul>
            <nav class="slides-navigation">
                <a href="#" class="next">
                    <i class="icon-chevron-right"></i>
                </a>
                <a href="#" class="prev">
                    <i class="icon-chevron-left"></i>
                </a>
            </nav>
            <div class="eficor-link">
                <a href="http://www.eficor.org/">
                    <img src="images/EFICOR.jpg" alt="">
                </a>
            </div>
        </div>
    </div>
@endsection
