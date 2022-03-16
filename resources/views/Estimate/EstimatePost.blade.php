<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <title>영업관리 시스템</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI,
            Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif,
            Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *, :after, :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg, video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media ( min-width: 640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media ( min-width: 768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media ( min-width: 1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media ( prefers-color-scheme: dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .table_EstimateDetail_List1, .table_EstimateDetail_List2 {
            display: flex;
            display: -webkit-box;
            display: -ms-flexbox;
            overflow-x: auto;
            overflow-y: hidden;
        }

        .table_EstimateDetail_List1 td, .table_EstimateDetail_List2 td {
            padding: 5px;
        }

        .table_EstimateDetail_List1 tbody, .table_EstimateDetail_List2 tbody {
            display: flex
        }

        .table_EstimateDetail_List1 th, .table_EstimateDetail_List2 th,
        .table_EstimateDetail_List1 td, .table_EstimateDetail_List2 td {
            display: block;
        }

        th, th, td {
            text-align: center;
        }

        th {
            background-color: #eeeeee;
            padding: 5px;
        }

        .table_EstimateDetail_List3 th {
            border: 2px solid black;
        }

        .table_EstimateDetail_List3 td {
            border: 2px solid black;
        }
    </style>

    <script type="text/javascript">
        function clickTrEvent(trObj) {
            alert(trObj.id);
        };

    </script>
</head>
<body class="antialiased">
@include('Layout.Sidebar')
<div class="min-h-screen" style="margin-left: 5%; margin-right: 5%; width: 77%; float: right;">
    <div id="print">
        <h2 style="text-align: center;">견적서</h2>
        <table class="table_EstimateDetail_List1"
               style="border: 1px solid black; width: 50%; float: left;">
            <thead>
            <tr>
                <th>견적번호</th>
                <th>상호명</th>
                <th>엔드유저</th>
                <th>담당자</th>
                <th>전화번호</th>
                <th>전자우편</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>-</td>
                <td>{{$Estimate->contact->company_name}}</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            </tbody>
        </table>
        <table class="table_EstimateDetail_List2"
               style="text-align: centger; border: 1px solid black; width: 50%;">
            <thead>
            <tr>
                <th>엔드유저</th>
                <th>계약명</th>
                <th>작성일</th>
                <th>담당자</th>
                <th>전화번호</th>
                <th>전자우편</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>{{$Estimate->sales_person}}</td>
                <td>-</td>
            </tr>
            </tbody>
        </table>
        <div style="border: 1px solid black; padding-left: 5px;">
            <h4>견적금액: 일금 ￦{{$Estimate->amount}} 원정(VAT 별도)</h4>
        </div>
        <h6 style="float: right">(단위 : 월, 부가세 별도)</h6>
        <table class="table_EstimateDetail_List3"
               style="text-align: centger; border: 1px solid black; width: 100%;">
            <thead>
            <tr>
                <th style="width: 15%">품명</th>
                <th>DESCRIPTION</th>
                <th>수량</th>
                <th>소비자단가</th>
                <th>제안단가</th>
                <th>총제안가</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr height='200px'>
                    <td>{{$item->name}}</td>
                    <td style="word-break: break-all; width: 50%;">{{$item->explanation}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->standard_unit_price}}</td>
                    <td>{{$item->suggested_unit_price}}</td>
                    <td>{{$item->total_offer_price}}</td>
                </tr>
            @endforeach
            <tr>
                <td>합계</td>
                @foreach($total as $totals)
                    <td colspan="5">{{$totals->total}}</td>
                @endforeach
            </tr>
            <tr>
                <td>부가세포함 가격</td>
                @foreach($tax_total as $t)
                    <td colspan="5">{{$t->tax_total}}</td>
                @endforeach
            </tr>
            <tr height='100px'>
                <td>비고</td>
                <td style="word-break: break-all; width: 40%;" colspan="5">
                    {{$Estimate -> note}}</td>
            </tr>
            </tbody>
        </table>

        <div>
            <h2 style="display: inline-block">상기와 같이 발주 부탁합니다:</h2>
            <h2 style="float: right;">담당자&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;사인</h2>
        </div>

        <div style="border-top: 5px solid black">
            <h4>사인 후 팩스 부탁드립니다.</h4>
        </div>
    </div>
</div>
<button onclick="return printPage();">프린트</button>
<button onclick="return downloadFile()">견적리스트 다운로드</button>
<script>
    function downloadFile() {
        const retContent = [];
        $('.table_EstimateDetail_List3 tbody tr').each(function (idx, elem)
        {
            const elemText = [];
            $(elem).children('td').each(function (childIdx, childElem)
            {
                elemText.push($(childElem).text());
            });
            retContent.push(`[${elemText.join(',')}]`);
        });

        const content = retContent.join(',\r\n');
        const blob = new Blob([content], {type: 'text/plain'})
        const url = window.URL.createObjectURL(blob)
        const a = document.createElement("a")
        a.href = url
        a.download = `{{$Estimate->contact->company_name}}_견적목록.txt`
        a.click()
        a.remove()
        window.URL.revokeObjectURL(url);
    }
</script>
<script>
    var initBodyHtml;

    function printPage() {
        window.print();
    }

    function beforePrint() {
        initBodyHtml = document.body.innerHTML;
        document.body.innerHTML = document.getElementById('print').innerHTML;
    }

    function afterPrint() {
        document.body.innerHTML = initBodyHtml;
    }

    window.onbeforeprint = beforePrint;
    window.onafterprint = afterPrint;

</script>
</body>
</html>
