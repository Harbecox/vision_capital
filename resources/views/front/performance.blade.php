@extends('front.layouts.front')
<title>Vision Capital - Performance</title>
@section("content")
    <section class="cap">
        <div class="cap__bg">
            <img src="/img/cap3.jpg" alt="">
        </div>
        <div class="row">
            <div class="cap__bread">
                <ul>
                    <li><a href="/">Home page</a></li>
                    <li><a href="{{route('performance')}}">Performance</a></li>
                </ul>
            </div>
            <h1 class="cap__title">Performance</h1>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="info">
                <div class="info__block">
                    <div class="info__title">Historical Performance</div>
                    <div class="info__table center">
                        <table>
                            <tr>
                                <th>Year</th>
                                <th>Vision Capital Growth Fund</th>
                                <th>Russell 1000 Growth Index</th>
                                <th>S&P 500 Index</th>
                            </tr>
                            <tr>
                                <td>2023</td>
                                <td>48.81%</td>
                                <td class="unbold">42.68%</td>
                                <td class="unbold">26.29%</td>
                            </tr>
                            <tr>
                                <td>2022</td>
                                <td>58.45%</td>
                                <td class="unbold">-29.14%</td>
                                <td class="unbold">-18.11%</td>
                            </tr>
                            <tr>
                                <td>2021</td>
                                <td>61.29%</td>
                                <td class="unbold">27.60%</td>
                                <td class="unbold">28.71%</td>
                            </tr>
                            <tr>
                                <td>2020</td>
                                <td>38.93%</td>
                                <td class="unbold">38.49%</td>
                                <td class="unbold">18.40%</td>
                            </tr>
                        </table>
                    </div>
                    <div class="info__text text">
                        <p>Growth of $10,000 (Growth Fund vs SP500, Year 2023)</p>
                    </div>
                </div>
                <div class="info__stat">
                    <div class="info__title">Investment Growth Comparison Over 12 Months</div>
                    <div class="info__stat-item">
                        <img src="/img/stat1-svg.svg" alt="">
                    </div>
                    <div class="info__title">Monthly Return in %</div>
                    <div class="info__stat-item">
                        <div class="info__table">
                            <table>
                                <tr>
                                    <th>Year</th>
                                    <th>Jan</th>
                                    <th>Feb</th>
                                    <th>Mar</th>
                                    <th>Apr</th>
                                    <th>May</th>
                                    <th>Jun</th>
                                    <th>Jul</th>
                                    <th>Aug</th>
                                    <th>Sep</th>
                                    <th>Oct</th>
                                    <th>Nov</th>
                                    <th>Dec</th>
                                    <th>Total %</th>
                                </tr>
                                <tr class="m_r">
                                    <td class="unbold">2024</td>
                                    <td class="unbold">5.58</td>
                                    <td class="unbold">2.41</td>
                                    <td class="unbold">3.88</td>
                                    <td class="unbold">4.05</td>
                                    <td class="unbold">4.80</td>
                                    <td class="unbold">5.15</td>
                                    <td class="unbold">5.11</td>
                                    <td class="unbold"></td>
                                    <td class="unbold"></td>
                                    <td class="unbold"></td>
                                    <td class="unbold"></td>
                                    <td class="unbold"></td>
{{--                                    <td class="unbold"><b>15.92%</b></td>--}}
                                </tr>
                                <tr>
                                    <td class="unbold">2023</td>
                                    <td class="unbold">2.37</td>
                                    <td class="unbold">2.45</td>
                                    <td class="unbold">1.43</td>
                                    <td class="unbold">8.61</td>
                                    <td class="unbold">4.22</td>
                                    <td class="unbold">3.45</td>
                                    <td class="unbold">3.15</td>
                                    <td class="unbold">7.78</td>
                                    <td class="unbold">6.08</td>
                                    <td class="unbold">6.1</td>
                                    <td class="unbold">2.48</td>
                                    <td class="unbold">0.69</td>
                                    <td class="unbold">48.81%</td>
                                </tr>
                                <tr>
                                    <td class="unbold">2022</td>
                                    <td class="unbold">2.99</td>
                                    <td class="unbold">1.78</td>
                                    <td class="unbold">3.94</td>
                                    <td class="unbold">1.12</td>
                                    <td class="unbold">7.35</td>
                                    <td class="unbold">3.15</td>
                                    <td class="unbold">9.35</td>
                                    <td class="unbold">3.38</td>
                                    <td class="unbold">9.8</td>
                                    <td class="unbold">4.1</td>
                                    <td class="unbold">6.04</td>
                                    <td class="unbold">5.46</td>
                                    <td class="unbold">58.45%</td>
                                </tr>
                                <tr>
                                    <td class="unbold">2021</td>
                                    <td class="unbold">6.13</td>
                                    <td class="unbold">1.62</td>
                                    <td class="unbold">5.91</td>
                                    <td class="unbold">8.21</td>
                                    <td class="unbold">7.65</td>
                                    <td class="unbold">6.13</td>
                                    <td class="unbold">6.41</td>
                                    <td class="unbold">0.12</td>
                                    <td class="unbold">0.24</td>
                                    <td class="unbold">4.36</td>
                                    <td class="unbold">5.75</td>
                                    <td class="unbold">8.77</td>
                                    <td class="unbold">61.29%</td>
                                </tr>
                                <tr>
                                    <td class="unbold">2020</td>
                                    <td class="unbold">2.54</td>
                                    <td class="unbold">0.67</td>
                                    <td class="unbold">4.13</td>
                                    <td class="unbold">0.29</td>
                                    <td class="unbold">4.29</td>
                                    <td class="unbold">6.33</td>
                                    <td class="unbold">4.5</td>
                                    <td class="unbold">4.31</td>
                                    <td class="unbold">3.27</td>
                                    <td class="unbold">1.19</td>
                                    <td class="unbold">6.9</td>
                                    <td class="unbold">0.51</td>
                                    <td class="unbold">38.93%</td>
                                </tr>
                                <tr>
                                    <td class="unbold">2019</td>
                                    <td class="unbold"></td>
                                    <td class="unbold"></td>
                                    <td class="unbold"></td>
                                    <td class="unbold">2.04</td>
                                    <td class="unbold">3.76</td>
                                    <td class="unbold">0.05</td>
                                    <td class="unbold">2.2</td>
                                    <td class="unbold">2.72</td>
                                    <td class="unbold">3.13</td>
                                    <td class="unbold">2.81</td>
                                    <td class="unbold">3.59</td>
                                    <td class="unbold">1.64</td>
                                    <td class="unbold">21.94%</td>
                                </tr>
                            </table>

                        </div>
                        <div style="display: flex;justify-content: center;margin-top: 20px;">
                            <a href="/register" class="btn">Open An Account</a>
                        </div>
                    </div>
                </div>
                <x-footer-info></x-footer-info>
            </div>
        </div>
        <script>
            let tr = document.querySelector(".m_r");
            let sum = 0;
            tr.querySelectorAll("td").forEach(function (td,i){
                 if(i > 0 && td.textContent.length > 0){
                     sum += parseFloat(td.textContent)
                 }
            });
            let td = document.createElement("td");
            td.textContent = sum.toFixed(2) + '%';
            tr.appendChild(td);
        </script>
    </section>
@endsection
