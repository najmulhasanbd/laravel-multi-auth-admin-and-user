@extends('admin.layouts.master')

@section('content')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&display=swap");

        * {
            margin: 0;
            padding: 0;
            outline: 0;
            box-sizing: border-box;
            font-family: "Arimo", sans-serif;
            font-optical-sizing: auto;
            font-weight: normal;
            font-style: normal;
        }

        .wrapper {
            margin: auto;
            max-width: 1200px;
            border: 1px dotted black;
            padding: 10px;
            border-radius: 10px;
        }

        @page {
            size: A4;
            margin: 25mm;
        }

        body {
            font-family: "Siyam Rupali", sans-serif;
            margin: 0;
            padding: 0;
            background: #eee;
            font-family: "Arimo", sans-serif;
            font-optical-sizing: auto;
            font-weight: normal;
            font-style: normal;
        }

        .wrapper {
            width: 210mm;
            min-height: 297mm;
            margin: auto;
            background: white;
            padding: 10mm;
            box-sizing: border-box;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        /* .wrapper-heading {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 15px;
        } */

        .text-center {
            text-align: center;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .border-dashed {
            display: inline-block;
            border-bottom: 1px dashed #000;
            padding: 0 4px;
            min-width: 80px;
        }

        p {
            margin: 0;
            font-size: 14px;
        }

        .multi-field {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .multi-field p {
            display: inline-block;
            vertical-align: top;
        }

        .border-dashed {
            display: inline-block;
            border-bottom: 1px dashed #000;
            padding: 0 4px;
            min-width: 80px;
        }

        @media print {
            body {
                background: none;
            }

            .wrapper {
                box-shadow: none;
                margin: 0;
            }
        }

        .wrapper-heading {
            padding: 10px;
            overflow: hidden;
        }

        .wrapper-left {
            float: left;
            width: 48%;
            text-align: left;
            font-size: 16px;
            line-height: 1.5;
        }

        .wrapper-right {
            float: right;
            width: 48%;
            text-align: right;
            font-size: 16px;
            line-height: 1.5;
        }

        .border-dashed {
            border-bottom: 1px dashed #000;
        }

        .border {
            border: 1px dashed black;
        }

        .borderRight {
            border-right: 1px dashed black;
        }

        .borderRightSolid {
            border-right: 1px solid gainsboro;
        }

        .borderTop {
            border-top: 1px dashed black;
        }

        .holding_number span {
            width: calc(100% - 225px);
        }

        .khatian_number span {
            width: calc(100% - 74px);
        }

        .mouja {
            width: calc(100% - 61%);
            margin-right: 5px;
        }

        .upazila {
            width: calc(100% - 66%);
        }

        .district {
            width: calc(100% - 75%);
        }

        .displayInline {
            display: inline-block;
        }

        .border2px {
            border-bottom: 1px dashed black;
        }

        .date-block {
            display: inline-block;
            text-align: center;
            line-height: 1.2;
            font-family: "Siyam Rupali", "Noto Sans Bengali", sans-serif;
        }

        .label {
            display: inline-block;
            vertical-align: top;
            margin-right: 5px;
        }

        .date-text {
            display: inline-block;
        }

        .hijri {
            border-bottom: 1px solid black;
            padding-bottom: 2px;
            font-size: 16px;
        }

        .gregorian {
            font-size: 16px;
        }

        .container {
            width: 100%;
            font-family: "Siyam Rupali", "Noto Sans Bengali", sans-serif;
            text-align: center;
        }

        .column {
            display: inline-block;
            vertical-align: top;
            width: auto;
            box-sizing: border-box;
            padding: 5px;
        }

        .column:first-child {
            text-align: left;
            width: 31.2%;
        }

        .column:nth-child(2) {
            padding: 0 53px;
        }

        .date-block {
            display: inline-block;
            text-align: center;
            line-height: 1.2;
        }

        .hijri {
            border-bottom: 1px solid black;
            padding-bottom: 2px;
            font-size: 16px;
        }

        .gregorian {
            font-size: 16px;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        .fonWeight {
            font-weight: normal;
        }

        .borderSolid {
            border: 2px solid gainsboro;
        }

        .fontSize12 {
            font-size: 12px;
        }

        .fontSize14 {
            font-size: 14px;
        }

        .heading {
            text-align: center;
            margin-bottom: 10px;
        }

        .heading span {
            border-bottom: 1px solid #000;
            padding: 2px 10px;
            font-size: 16px;
        }

        .table-container {
            width: 100%;
        }

        .tbl {
            width: 48%;
            display: inline-block;
            vertical-align: top;
            font-size: 14px;
            border-collapse: collapse;
        }

        .tbl.right {
            margin-left: 3%;
        }

        .tbl-td {
            border: 1px dotted black;
            padding: 4px 6px;
            text-align: center;
        }

        .fontSize14 {
            font-size: 14px;
        }

        .fontSize12 {
            font-size: 12px;
        }
    </style>
    <div class="main-content">
        <div class="header mb-2 d-flex justify-content-between align-items-center">
            <h4>Land Show</h4>
        </div>
        <div class="text-end mb-3">
            <button class="btn btn-primary btn-sm d-inline" onclick="invoiceFunction('invoice_print')">Print
                <i class="fa fa-print"></i></button>
        </div>
        <div class="wrapper" id="invoice_print">
            <div class="wrapper-heading">
                <div class="wrapper-left">
                    বাংলাদেশ ফরম নং ১০৭৭ <br />
                    (সংশোধিত)
                </div>
                <div class="wrapper-right">
                    (পরিপত্র: ৩৮) <br />
                    323025034678 <br />
                </div>
            </div>
            <div class="text-center fonWeight">
                ভূমি উন্নয়ন কর পরিশোধের রশিদ <br />
                (অনুচ্ছেদ ৩৯২ ইউনিয়ন)
            </div>
            <div class="city">
                <p class="displayInline">সিটি কর্পোরেশন পৌর/ইউনিয়ন ভুমি অফিসের নাম:</p>
                <p class="displayInline border2px" style="width: 57%">
                    সাপমারা ইউনিয়ন ভুমি অফিস
                </p>
            </div>

            <div>
                <div class="multi-field">
                    <div class="mouja displayInline">
                        <p>মৌজার নাম ও জে. এল. নং:</p>
                        <p class="border2px" style="width: 110px">মদনপুর-৮৭</p>
                    </div>
                    <div class="upazila displayInline">
                        <p>উপজেলা/থানা:</p>
                        <p class="border2px" style="width: 150px">গোবিন্দগন্জ</p>
                    </div>
                    <div class="district displayInline">
                        <p>জেলা:</p>
                        <p style="width: 138px" class="border2px">গাইবান্ধা</p>
                    </div>
                </div>

                <p class="holding_number">
                    ২নং রেজিস্টার অনুযায়ী হোল্ডিং নম্বর:
                    <span class="border-dashed">২৫-৬৫৫</span>
                </p>
                <p class="khatian_number">
                    খতিয়ান নং: <span class="border-dashed">২৫-৬৫৫</span>
                </p>
            </div>

            <div style="margin-top: 10px">
                <h6 class="text-center">
                    <span style="border-bottom: 1px solid #000"> মালিকের বিবরণ</span>
                </h6>
                <table style="width: 100%" class="border">
                    <thead>
                        <tr>
                            <th style="width: 10%; text-align:center;" class="borderRight fonWeight fontSize14">ক্রম:</th>
                            <th style="width: 65%; text-align:center;" class="borderRight fonWeight fontSize14">মালিকের নাম
                            </th>
                            <th style="width: 25%; text-align:center;" class="fonWeight fontSize14">মালিকের অংশ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center borderTop borderRight fontSize12 fonWeight">১</td>
                            <td class="borderRight borderTop fontSize12">মো: আব্দুল রশিদ শেখ</td>
                            <td class="text-center borderTop fonWeight fontSize12">১</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 10px">
                <div class="heading">
                    <span>জমির বিবরণ</span>
                </div>

                <div class="table-container">
                    <table class="tbl">
                        <tr class="tbl-tr">
                            <td class="tbl-td fonWeight fontSize14">ক্রম:</td>
                            <td class="tbl-td fonWeight fontSize14">দাগ নং</td>
                            <td class="tbl-td fonWeight fontSize14">জমির শ্রেণি</td>
                            <td class="tbl-td fonWeight fontSize14">জমির পরিমাণ (শতাংশ)</td>
                        </tr>
                        <tr class="tbl-tr">
                            <td class="tbl-td fontSize12">১</td>
                            <td class="tbl-td fontSize12">৩১১০</td>
                            <td class="tbl-td fontSize12 fonWeight">দলা (কৃষি)</td>
                            <td class="tbl-td fontSize12 fonWeight">১৩.৩৩</td>
                        </tr>
                        <tr class="tbl-tr">
                            <td class="tbl-td fontSize12">২</td>
                            <td class="tbl-td fontSize12">৩১১১</td>
                            <td class="tbl-td fontSize12 fonWeight">দলা (কৃষি)</td>
                            <td class="tbl-td fontSize12 fonWeight">৩০</td>
                        </tr>
                    </table>

                    <table class="tbl right">
                        <tr class="tbl-tr">
                            <td class="tbl-td fonWeight fontSize14">ক্রম:</td>
                            <td class="tbl-td fonWeight fontSize14">দাগ নং</td>
                            <td class="tbl-td fonWeight fontSize14">জমির শ্রেণি</td>
                            <td class="tbl-td fonWeight fontSize14">জমির পরিমাণ (শতাংশ)</td>
                        </tr>
                        <tr class="tbl-tr">
                            <td class="tbl-td fontSize12 fonWeight">৩</td>
                            <td class="tbl-td fontSize12">৩১১২</td>
                            <td class="tbl-td fontSize12 fonWeight">দলা (কৃষি)</td>
                            <td class="tbl-td fontSize12 fonWeight">০</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="border" style="margin-top: 10px">
                <p style="
            display: inline-block;
            width: calc(100% - 50%);
            text-align: center;
            padding: 2px;
          "
                    class="borderRight fonWeight">
                    সর্বমোট জমি(শতাংশ)
                </p>
                <p style="display: inline-block; width: 49%; padding: 2px">৪৯.৩৩</p>
            </div>
            <div style="margin-top: 20px">
                <h4
                    style="
            text-align: center;
            border: 2px solid gainsboro;
            border-bottom: 0;
            padding: 8px;
            font-weight: bold;
          ">
                    আদায়ের বিবরণ
                </h4>
                <table
                    style="
            border-collapse: collapse;
            width: 100%;
            border: 2px solid gainsboro;
          ">
                    <thead>
                        <tr>
                            <td class="borderSolid fontSize14" style="text-align: center; padding: 5px">
                                তিন ব‍ছরের ঊর্ধ্বের বকেয়া
                            </td>
                            <td class="borderSolid fontSize14" style="text-align: center; padding: 5px">
                                গত তিন ব‍ছরের বকেয়া
                            </td>
                            <td class="borderSolid fontSize14" style="text-align: center; padding: 5px">
                                বকেয়ারে জরিমানা ও খতিপূরণ
                            </td>
                            <td class="borderSolid fontSize14" style="text-align: center; padding: 5px">
                                হাল দাবি
                            </td>
                            <td class="borderSolid fontSize14" style="text-align: center; padding: 5px">
                                মোট দাবি
                            </td>
                            <td class="borderSolid fontSize14" style="text-align: center; padding: 5px">
                                মোট আদায়
                            </td>
                            <td class="borderSolid fontSize14" style="text-align: center; padding: 5px">
                                মোট বকেয়া
                            </td>
                            <td class="borderSolid fontSize14" style="text-align: center; padding: 5px">
                                মন্তব্য
                            </td>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td class="fonWeight borderSolid" style="padding: 8px">৮৯</td>
                            <td class="fonWeight borderSolid" style="padding: 8px">৩০</td>
                            <td class="fonWeight borderSolid" style="padding: 8px">৬৫</td>
                            <td class="fonWeight borderSolid" style="padding: 8px">১০</td>
                            <td class="fonWeight borderSolid" style="padding: 8px">১৯৪</td>
                            <td class="fonWeight borderSolid" style="padding: 8px">১৯৪</td>
                            <td class="fonWeight borderSolid" style="padding: 8px">০</td>
                            <td class="fonWeight borderSolid" style="padding: 8px"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p class="border-dashed" style="width: 100%; margin: 10px 0">
                সর্বমোট(কথায়): একশত চুরানব্বই টাকা মাত্র ।
            </p>

            <div>
                <p>নোট: সর্বশেষ কর পরিশোধের সাল-2024-2025(অর্থবছর)</p>
                <p>চালান নং: : 2425-0028183841</p>
            </div>

            <div class="container">
                <!-- Column 1: Date -->
                <div class="column">
                    <span class="label">তারিখঃ</span>
                    <span class="date-block">
                        <div class="hijri">২৫ ফাল্গুন ১৪৩১</div>
                        <div class="gregorian">০৯ মার্চ, ২০২৫</div>
                    </span>
                </div>

                <!-- Column 2: QR Code -->
                <div class="column">
                    <img src="{{ asset('pdf/qr.png') }}" alt="QR Code" />
                </div>

                <!-- Column 3: Note -->
                <div class="column">
                    <p>
                        এই দাখিলা ইলেক্ট্রনিকভাবে তৈরি করা হয়েছে, <br />
                        কোন স্বাক্কর প্রয়োজন নেই।
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function invoiceFunction(el) {
            let restorepage = document.body.innerHTML;
            let printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
            location.reload()
        }
    </script>
@endsection
