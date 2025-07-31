@extends('front.layouts.front')
<title>Vision Capital - About Us</title>
@section("content")
    <section class="cap">
        <div class="cap__bg">
            <img src="/img/cap2.jpg" alt="">
        </div>
        <div class="row">
            <div class="cap__bread">
                <ul>
                    <li><a href="/">Home page</a></li>
                    <li><a href="{{route('about_us')}}">About Us</a></li>
                </ul>
            </div>
            <h1 class="cap__title">About Us</h1>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="info">
                <div class="info__block">
                    <div class="info__text text">
                        <p>Vision Capital stands apart due to its unique structure. As a company, we are owned by the very people who invest in our fund, setting us apart in the industry. This distinctive ownership model ensures that we are aligned with our investors' interests, serving as your dedicated partner committed to your long-term success rather than being driven by short-term gains. This embodies the essence of the Value of Ownership.</p>
                        <h4>Our Mission</h4>
                        <p>Our mission is clear: to advocate for all investors, ensuring fair treatment and providing them with the optimal opportunity for investment success.</p>
                        <p>Thanks to Vision Capital's unique structure, your aspirations are in sync with ours. Whether you're setting aside funds for retirement, your children's education, or simply seeking financial stability, rest assured that we're fully committed to supporting your objectives every step of the way.</p>
                    </div>
                </div>
                <div class="info__team">
                    <div class="info__team-item">
                        <div class="info__team-img">
                            <img src="/img/edward-baker2-CEO.jpg" alt="">
                        </div>
                        <div class="info__team-name">Edward Baker</div>
                        <div class="info__team-pos">CEO</div>
                        <div class="info__team-soc">
                            <a target="_blank" href="https://www.linkedin.com/in/edward-baker-399a67276/"><img src="/img/icon-soc-in.svg" alt=""></a>
                        </div>
                    </div>
                    <div class="info__team-item">
                        <div class="info__team-img">
                            <img src="/img/steven-wilson-COO.jpg" alt="">
                        </div>
                        <div class="info__team-name">Steven Wilson</div>
                        <div class="info__team-pos">President and COO</div>
                        <div class="info__team-soc">

                        </div>
                    </div>

                    <div class="info__team-item">
                        <div class="info__team-img">
                            <img src="/img/charles-roberts-fundmanager.jpg" alt="">
                        </div>
                        <div class="info__team-name">Charles Roberts</div>
                        <div class="info__team-pos">Fund Manager</div>
                        <div class="info__team-soc">
                            <a href="https://www.linkedin.com/in/charles-roberts-521a87276/"><img src="/img/icon-soc-in.svg" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="info__block">
                    <div class="info__title">A track record of strong performance</div>
                    <div class="info__text text">
                        <p>At Vision Capital, your needs take center stage alongside our dedication to low-cost investing principles. By reducing costs, we amplify the effectiveness of your investments, allowing your money to work harder for your benefit.</p>
                    </div>
                    <div class="info__btns">
                        <a href="{{route('performance')}}" class="btn">Check Our Past Performance</a>
                    </div>
                </div>
                <div class="info__doc">
                    <div class="info__title">Documents</div>
                    <div class="info__doc-block">
                        <a target="_blank" href="/pdf/1817-SUMMARY-R01.pdf" class="info__doc-item">
                            <img src="/img/icon-doc.svg" alt="">
                            <p>Summary Prospectus</p>
                            <p><small>Pdf</small></p>
                        </a>
                        <a target="_blank" href="/pdf/1834-SEMI-R01.pdf" class="info__doc-item">
                            <img src="/img/icon-doc.svg" alt="">
                            <p>Semi Annual Report Mar 31, 2023</p>
                            <p><small>Pdf</small></p>
                        </a>
                        <a target="_blank" href="/pdf/1834-ANNUAL-R01.pdf" class="info__doc-item">
                            <img src="/img/icon-doc.svg" alt="">
                            <p>December 31, 2023 Full Report</p>
                            <p><small>Pdf</small></p>
                        </a>

                    </div>
                </div>
                <x-footer-info></x-footer-info>
            </div>
        </div>
    </section>
@endsection
