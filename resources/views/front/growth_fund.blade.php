@extends('front.layouts.front')
<title>Vision Capital - Growth Fund</title>
@section('content')
    <style>


    </style>
    <section class="cap">
        <div class="cap__bg">
            <img src="/img/cap1.jpg" alt="">
        </div>
        <div class="row">
            <div class="cap__bread">
                <ul>
                    <li><a href="/">Home page</a></li>
                    <li><a href="{{route('growth_fund')}}">Growth Fund</a></li>
                </ul>
            </div>
            <h1 class="cap__title">Growth Fund</h1>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="info">
                <div class="info__block">
                    <div class="info__block-item">
                        <div class="info__text text">
                            <p>The Fund invests mainly in large-sized U.S. companies with significant growth potential and competitive advantages. <i>Diversified.</i> Experience Transparent Investing: Our <b>performance-based</b> mutual fund ensures fees are incurred <b>solely</b> on profitability, guaranteeing no hidden costs.</p>
                            <p>The Fund is not intended for short-term traders planning to buy and then sell within a 90-day period. During this period, only dividends can be withdrawn; the principal becomes available after 90 days</p>
                        </div>
                    </div>
                    <div class="info__block-item">
                        <div class="info__table">
                            <table>
                                <tr>
                                    <th>Year</th>
                                    <th>Fund's Annual Return</th>
                                    <th>Benchmark - Russell 1000</th>
                                </tr>
                                <tr>
                                    <td>2023</td>
                                    <td>48.81%</td>
                                    <td class="unbold">42.68%</td>
                                </tr>
                                <tr>
                                    <td>2022</td>
                                    <td>58.45%</td>
                                    <td class="unbold">-29.14%</td>
                                </tr>
                                <tr>
                                    <td>2021</td>
                                    <td>61.29%</td>
                                    <td class="unbold">27.60%</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="info__attribute">
                    <div class="info__title">Portfolio Characteristics as of: 31/01/2024</div>
                    <div class="info__attribute-block">
                        <ul class="info__attribute-list">
                            <li>Minimum Investment: <b>$5,000</b></li>
                            <li>Category: <b>Mid-Large Growth</b></li>
                            <li>Stock Holdings: <b>31</b></li>
                            <li>Inception: <b>Apr 2019</b></li>
                        </ul>
                        <div class="info__attribute-btn"><a href="{{route('register')}}" class="btn">Open An Account</a></div>
                    </div>
                </div>
                <div class="info__block">
                    <div class="info__block-item">
                        <div class="info__title">Top 10 Holdings as of: 31/01/2024:</div>
                        <div class="info__table">
                            <table>
                                <tr>
                                    <th>Year</th>
                                    <th>Ticker</th>
                                    <th><span style="white-space: nowrap;">Stock Performance 2023</span></th>
                                    <th><span style="white-space: nowrap;">Holding %</span></th>
                                </tr>
                                <tr>
                                    <td class="unbold">Nvidia Corporation</td>
                                    <td class="unbold">NVDA</td>
                                    <td class="unbold"><span style="color: #16BE13">230.00%</span></td>
                                    <td class="unbold">8.59</td>
                                </tr>
                                <tr>
                                    <td class="unbold">Okta, Inc</td>
                                    <td class="unbold">OKTA</td>
                                    <td class="unbold"><span style="color: #16BE13">32.00%</span></td>
                                    <td class="unbold">7.68</td>
                                </tr>
                                <tr>
                                    <td class="unbold">Advanced Micro Devices, Inc</td>
                                    <td class="unbold">AMD</td>
                                    <td class="unbold"><span style="color: #16BE13">127.00%</span></td>
                                    <td class="unbold">6.16</td>
                                </tr>
                                <tr>
                                    <td class="unbold">Palo Alto Networks</td>
                                    <td class="unbold">PANW</td>
                                    <td class="unbold"><span style="color: #16BE13">111.29%</span></td>
                                    <td class="unbold">5.85</td>
                                </tr>
                                <tr>
                                    <td class="unbold">Zscaler, Inc</td>
                                    <td class="unbold">ZS</td>
                                    <td class="unbold"><span style="color: #16BE13">98.21%</span></td>
                                    <td class="unbold">4.55</td>
                                </tr>
                                <tr>
                                    <td class="unbold">Amazon.com, Inc</td>
                                    <td class="unbold">AMZN</td>
                                    <td class="unbold"><span style="color: #16BE13">81.88%</span></td>
                                    <td class="unbold">4.17</td>
                                </tr>
                                <tr>
                                    <td class="unbold">Roku, Inc.</td>
                                    <td class="unbold">ROKU</td>
                                    <td class="unbold"><span style="color: #16BE13">125.34%</span></td>
                                    <td class="unbold">3.64</td>
                                </tr>
                                <tr>
                                    <td class="unbold">UnitedHealth Group Incorporated</td>
                                    <td class="unbold">UNH</td>
                                    <td class="unbold"><span style="color: #ff0000">-0.70%</span></td>
                                    <td class="unbold">3.3</td>
                                </tr>
                                <tr>
                                    <td class="unbold">The Goldman Sachs Group</td>
                                    <td class="unbold">GS</td>
                                    <td class="unbold"><span style="color: #16BE13">2.17%</span></td>
                                    <td class="unbold">3.18</td>
                                </tr>
                                <tr>
                                    <td class="unbold">SentinelOne Inc</td>
                                    <td class="unbold">S</td>
                                    <td class="unbold"><span style="color: #16BE13">62.51%</span></td>
                                    <td class="unbold">3.09</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <th><b>50.21%</b></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="info__block-item">
                        <div class="info__title">Sector Allocation (% Equity) for the Growth Fund</div>
                        <div class="info__table">
                            <table>
                                <tr>
                                    <th></th>
                                    <th>Sector</th>
                                    <th>%</th>
                                </tr>
                                <tr>
                                    <td><div class="info__table-circle" style="background: #395AD0;"></div></td>
                                    <td class="unbold">Technology (Semiconductors, Cybersecurity, Software, Cloud Security): </td>
                                    <td class="unbold">43.85%</td>
                                </tr>
                                <tr>
                                    <td><div class="info__table-circle" style="background: #466BF0;"></div></td>
                                    <td class="unbold">Consumer Discretionary (E-commerce, Digital Streaming Devices): </td>
                                    <td class="unbold">12.04%</td>
                                </tr>
                                <tr>
                                    <td><div class="info__table-circle" style="background: #718FF8;"></div></td>
                                    <td class="unbold">Healthcare (Managed Healthcare): </td>
                                    <td class="unbold">4.1%</td>
                                </tr>
                                <tr>
                                    <td><div class="info__table-circle" style="background: #AABCFC;"></div></td>
                                    <td class="unbold">Financials (Investment Banking & Financial Services):</td>
                                    <td class="unbold">10.05%</td>
                                </tr>
                                <tr>
                                    <td><div class="info__table-circle" style="background: #E6550D;"></div></td>
                                    <td class="unbold">Industrials and Materials: </td>
                                    <td class="unbold">6.88%</td>
                                </tr>
                                <tr>
                                    <td><div class="info__table-circle" style="background: #FD8D3C;"></div></td>
                                    <td class="unbold">Energy: </td>
                                    <td class="unbold">5.1%</td>
                                </tr>
                                <tr>
                                    <td><div class="info__table-circle" style="background: #FDAE6B;"></div></td>
                                    <td class="unbold">Utilities: </td>
                                    <td class="unbold">6.8%</td>
                                </tr>
                                <tr>
                                    <td><div class="info__table-circle" style="background: #FDD0A2;"></div></td>
                                    <td class="unbold">Real Estate: </td>
                                    <td class="unbold">2.2%</td>
                                </tr>
                                <tr>
                                    <td><div class="info__table-circle" style="background: #31A354;"></div></td>
                                    <td class="unbold">Consumer Staples: </td>
                                    <td class="unbold">4%</td>
                                </tr>
                                <tr>
                                    <td><div class="info__table-circle" style="background: #53C576;"></div></td>
                                    <td class="unbold">Telecommunications: </td>
                                    <td class="unbold">1.1%</td>
                                </tr>
                                <tr>
                                    <td><div class="info__table-circle" style="background: #53C576;"></div></td>
                                    <td class="unbold">Information Technology & Services</td>
                                    <td class="unbold">3.88%</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="info__text text">
                        <p>This sector allocation is designed to leverage growth opportunities across a broad spectrum of industries, with a strong emphasis on technology and consumer discretionary sectors, reflecting the current trends and innovations driving the market. The allocations to healthcare, financials, and other sectors aim to provide diversification, mitigating risk while still targeting areas with potential for significant growth.</p>
                    </div>
                </div>
                <div class="info__block">
                    <div class="info__title">Fees:</div>
                    <div class="info__text text">
                        <p>The fund operates without sales, redemption, management fees. Instead, it solely charges a performance fee, structured according to the following balance schedule:</p>
                    </div>
                    <div class="info__table center">
                        <table>
                            <tr>
                                <th style="width: 50%;">Amount Invested</th>
                                <th style="width: 50%;">Performance Fee</th>
                            </tr>
                            <tr>
                                <td class="unbold">$5,000 - $24,999</td>
                                <td class="unbold">15%</td>
                            </tr>
                            <tr>
                                <td class="unbold">$25,000 – $74,999</td>
                                <td class="unbold">10%</td>
                            </tr>
                            <tr>
                                <td class="unbold">$75,000 - $249,999</td>
                                <td class="unbold">7.5%</td>
                            </tr>
                            <tr>
                                <td class="unbold">$250,000 - ~</td>
                                <td class="unbold">5%</td>
                            </tr>
                        </table>
                    </div>
                    <div class="info__btns">
                        <a href="{{route('register')}}" class="btn">Open An Account</a>
                        <a href="{{route('performance')}}" class="btn">Past Performance</a>
                    </div>
                </div>

                <div class="info__block calc">
                    <div class="info__title" style="text-align: center;width: 100%">CALCULATE YOUR ESTIMATE</div>
                    <div class="info__text"  style="text-align: center">See your potential</div>
                    <div class="info__text"  style="text-align: center">   Check out our dividend calculator to see just how much the power of time and compound interest can help your money grow.</div>
                    <div class="info__block" >
                        <div class="info__block-item" style="display: flex;justify-content: end">
                            <div class="form-group">
                                <label for="inp_dep" class="form-label" style="text-align: center;font-weight: bold">Initial Deposit</label>
                                <input id="inp_dep" class="login-input ">
                            </div>
                        </div>
                        <div class="info__block-item">
                            <div class="form-group">
                                <label for="inp_avg" class="form-label" style="text-align: center;font-weight: bold">Your Average Monthly Return*</label>
                                <input readonly id="inp_avg" class="login-input">
                                <div style="font-size: 0.8em;margin-top: 10px">* - Based on past performance</div>
                            </div>
                        </div>
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
