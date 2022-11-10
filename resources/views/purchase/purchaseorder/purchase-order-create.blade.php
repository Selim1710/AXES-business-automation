@extends('layouts.app')
@section('content')
    <h2 class="mt-4 mb-4">Order Create</h2>
    <style>
    

        .quickbox {
            overflow-y: scroll;
            height: 50vh;
        }
        
        img{
            height: 85px;
            width: 200px;
        }
        .quick {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-column-gap: 1fr;
            grid-row-gap: 1fr;
    
        }
        .quickLink{
            width: 150px;
            height: 110px;
            margin: 20px 20px;
            background-color: gray;
            border-radius: 4px;
            box-shadow: 0 0 20px 2px rgba(0,0,0,.1);
            transition: 1s;
        }
        .quickLink img {
            display: block;
            width: 100%;
            border-radius: 5px;
           
        }

        .quickLink:hover {
            transform: scale(1.3);
            z-index: 2;


        }
        .input-group-addon{
            float: left;
            width: 50px;
            height: 50px;
            border: 1px solid gray;
            background: white;
            text-align: center;
            padding-top: 12px;
            border-radius: 4px;
        }
        .quickLink a {
            text-decoration: none;
        }
        .quickLink a span{
            margin-left: 20px;
            color: black;
        }
        /* .form-group ul li{
            margin-top: 8px;
        }
        .form-group ul li a{
            text-decoration: none;
            border: 1px solid rgb(209, 208, 208);
            padding: 5px;
            color: black;
        } */
        #contactForm{
            width: 100%;
            /* z-index: 3; */
        }
        
    </style>

    <section class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                            <input type="text" class="form-control" name="search" id="search"
                                                placeholder="e.g. Product Code or Name" autocomplete="off">
                                        </div>
                                    </div>
                                    
                                    <div class="quickslide">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>Products</h4>
                                                <div class="quickbox">
                                                    <div class="quick">
                                                        <div class="quickLink">
                                                            <a href="sel_sinvcteate.php">
                                                                <img src="{{ asset('images/laptop1.png') }}" alt="Sales"><span>Laptop</span></a>
                                                        </div>
                                                        <div class="quickLink">
                                                            <a href="ser_serinvcre.php">
                                                                <img src="{{ asset('images/laptop2.png') }}"
                                                                    alt="Service Sale"><span>Laptop</span></a>
                                                        </div>
                                                        <div class="quickLink">
                                                            <a href="sel_sreturncteate.php">
                                                                <img src="{{ asset('images/laptop3.png') }}" alt="Sales Return"><span>
                                                                    Laptop</span></a>
                                                        </div>
                                                        <div class="quickLink">
                                                            <a href="pur_pinvcteate.php">
                                                                <img src="{{ asset('images/mobile1.png') }}" alt="Purchase"><span>Mobile</span></a>
                                                        </div>
                                                        <div class="quickLink">
                                                            <a href="pur_preturncteate.php">
                                                                <img src="{{ asset('images/laptop2.png') }}" alt="Purchase Return"><span>
                                                                    Laptop</span></a>
                                                        </div>
                                                        <div class="quickLink">
                                                            <a href="pro_productcreate.php">
                                                                <img src="{{ asset('images/mobile2.png') }}" alt="Add Product"><span>
                                                                    Mobile</span></a>
                                                        </div>
                                                        <div class="quickLink">
                                                            <a href="dai_expensescreate.php">
                                                                <img src="{{ asset('images/mobile3.png') }}" alt="Expenses"><span>Mobile</span></a>
                                                        </div>
                                                        <div class="quickLink">
                                                            <a href="acc_reccreate.php">
                                                                <img src="{{ asset('images/mobile1.png') }}" alt="Cash Received"><span>
                                                                    Mobile</span></a>
                                                        </div>
                                                        <div class="quickLink">
                                                            <a href="acc_paycreate.php">
                                                                <img src="{{ asset('images/laptop1.png') }}" alt="Cash Payment"><span>
                                                                    Laptop</span></a>
                                                        </div>
                                                        <div class="quickLink">
                                                            <a href="rep_dailycashst.php">
                                                                <img src="{{ asset('images/laptop2.png') }}" alt="Cash Statement"><span>
                                                                    Laptop</span></a>
                                                        </div>
                                                        <div class="quickLink">
                                                            <a href="war_claim.php">
                                                                <img src="{{ asset('images/laptop3.png') }}" alt="Warranty Claim"><span>
                                                                    Laptop</span></a>
                                                        </div>
                                                        <div class="quickLink">
                                                            <a href="inv_brstocklist.php">
                                                                <img src="{{ asset('images/laptop1.png') }}"
                                                                    alt="Inventory"><span>Laptop</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>



                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="product-panel style-2" id="purchaseitem" style="height: 171px;">
                                    <div class="product-content product-select selitem" id="AX_GP031022101" title="Pur">
                                        <img src="{{ asset('images/Screenshot (14).png') }}"
                                            class="product-image">
                                        <div class="info">
                                            <h3>4000.00</h3>
                                            <p>Qty: 191<br>Cost: 100.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">Pur</b></div>
                                        <div class="product-code"><b class="sku">ABA1149PB130</b><b class="indexg"
                                                style="display:none;"> </b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP031022102"
                                        title="Purchase">
                                        <img src="{{ asset('images/Screenshot (14).png') }}"
                                            class="product-image">
                                        <div class="info">
                                            <h3>1300.00</h3>
                                            <p>Qty: 15<br>Cost: 20.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name"> Purchase</b></div>
                                        <div class="product-code"><b class="sku">ABA1150PB130</b><b class="indexg"
                                                style="display:none;"> </b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP031022103"
                                        title="     Purchase Edit">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>20.00</h3>
                                            <p>Qty: 10<br>Cost: 10.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name"> Purchase Edit</b></div>
                                        <div class="product-code"><b class="sku">ABA1151PB130</b><b class="indexg"
                                                style="display:none;"> </b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP230722101"
                                        title="     Test">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>600.00</h3>
                                            <p>Qty: 28<br>Cost: 400.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name"> Test</b></div>
                                        <div class="product-code"><b class="sku">ABA1141PB122</b><b class="indexg"
                                                style="display:none;"> </b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP220722102"
                                        title="Test">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>700.00</h3>
                                            <p>Qty: 27<br>Cost: 450.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name"> Test</b></div>
                                        <div class="product-code"><b class="sku">ABA1141PB121</b><b class="indexg"
                                                style="display:none;"> </b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP300922101"
                                        title="CAMERA ACCESSORIES HOOD STANDARD 52MM ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>400.00</h3>
                                            <p>Qty: 1<br>Cost: 300.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name"> CAMERA ACCESSORIES HOOD STANDARD
                                                52MM </b></div>
                                        <div class="product-code"><b class="sku">ABA880PB129</b><b class="indexg"
                                                style="display:none;"> </b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP190222102"
                                        title="    GLASS SCREEN PROTEETOR  ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>120.00</h3>
                                            <p>Qty: 2<br>Cost: 80.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name"> GLASS SCREEN PROTEETOR </b></div>
                                        <div class="product-code"><b class="sku">ABA1042PB91</b><b class="indexg"
                                                style="display:none;"> </b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP190222101"
                                        title="    TNT CONVARTER  SOCKET ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>250.00</h3>
                                            <p>Qty: 8<br>Cost: 220.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name"> TNT CONVARTER SOCKET </b></div>
                                        <div class="product-code"><b class="sku">ABA1113PB91</b><b class="indexg"
                                                style="display:none;"> </b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP090422101"
                                        title=" Albo  1.2 1 Inch ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>50.00</h3>
                                            <p>Qty: 59998<br>Cost: 45.50</p>
                                        </div>
                                        <div class="product-detail"><b class="name"> Albo 1.2 1 Inch </b></div>
                                        <div class="product-code"><b class="sku">ABA1123PB97</b><b class="indexg"
                                                style="display:none;"> </b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP100422102"
                                        title=" Albo  1.2 1 Inch "> <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>48.00</h3>
                                            <p>Qty: 9998<br>Cost: 45.50</p>
                                        </div>
                                        <div class="product-detail"><b class="name"> Albo 1.2 1 Inch </b></div>
                                        <div class="product-code"><b class="sku">ABA1123PB99</b><b class="indexg"
                                                style="display:none;"> </b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP100422101"
                                        title=" Albo  1.2 1 Inch ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>48.00</h3>
                                            <p>Qty: 99997<br>Cost: 44.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name"> Albo 1.2 1 Inch </b></div>
                                        <div class="product-code"><b class="sku">ABA1123PB98</b><b class="indexg"
                                                style="display:none;"> </b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP100422103"
                                        title=" Albo  1.2 1 Inch ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>48.00</h3>
                                            <p>Qty: 9998<br>Cost: 45.50</p>
                                        </div>
                                        <div class="product-detail"><b class="name"> Albo 1.2 1 Inch </b></div>
                                        <div class="product-code"><b class="sku">ABA1123PB100</b><b class="indexg"
                                                style="display:none;"> </b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP120622105"
                                        title=" Albo-1.2  W-4  ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>50.00</h3>
                                            <p>Qty: 100<br>Cost: 45.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name"> Albo-1.2 W-4 </b></div>
                                        <div class="product-code"><b class="sku">ABA1126PB112</b><b class="indexg"
                                                style="display:none;"> </b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP291022102"
                                        title=" Mobile Phone  LED  VIVO Y20">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>1500.00</h3>
                                            <p>Qty: 2<br>Cost: 1,000.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name"> Mobile Phone LED VIVO Y20</b></div>
                                        <div class="product-code"><b class="sku">ABA1158PB135</b><b class="indexg"
                                                style="display:none;"> </b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP291022101"
                                        title=" Mobile Phone  LED  VIVO Y20">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>1500.00</h3>
                                            <p>Qty: 3<br>Cost: 1,200.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name"> Mobile Phone LED VIVO Y20</b></div>
                                        <div class="product-code"><b class="sku">ABA1158PB134</b><b class="indexg"
                                                style="display:none;"> </b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP230522102"
                                        title="ACER LAPTOP BAG    ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>10000.00</h3>
                                            <p>Qty: 9<br>Cost: 50,000.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">ACER LAPTOP BAG </b></div>
                                        <div class="product-code"><b class="sku">ABA019PB107</b><b class="indexg"
                                                style="display:none;">A</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP181022101"
                                        title="CANON SCANNER  LIDE-300  ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>1100.00</h3>
                                            <p>Qty: 1<br>Cost: 1,000.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">CANON SCANNER LIDE-300 </b></div>
                                        <div class="product-code"><b class="sku">ABA1156PB133</b><b class="indexg"
                                                style="display:none;">C</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP210222102"
                                        title="Chocofan">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>10.00</h3>
                                            <p>Qty: 5<br>Cost: 4.20</p>
                                        </div>
                                        <div class="product-detail"><b class="name">Chocofan</b></div>
                                        <div class="product-code"><b class="sku">ABA1119PB94</b><b class="indexg"
                                                style="display:none;">C</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP120622104"
                                        title="Chocofan">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>10.00</h3>
                                            <p>Qty: 98<br>Cost: 4.20</p>
                                        </div>
                                        <div class="product-detail"><b class="name">Chocofan</b></div>
                                        <div class="product-code"><b class="sku">ABA1119PB112</b><b class="indexg"
                                                style="display:none;">C</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP210222101"
                                        title="Chocofan">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>10.00</h3>
                                            <p>Qty: 21<br>Cost: 4.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">Chocofan</b></div>
                                        <div class="product-code"><b class="sku">ABA1119PB93</b><b class="indexg"
                                                style="display:none;">C</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP170522102"
                                        title="Chocofan">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>5.00</h3>
                                            <p>Qty: 20<br>Cost: 4.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">Chocofan</b></div>
                                        <div class="product-code"><b class="sku">ABA1119PB103</b><b class="indexg"
                                                style="display:none;">C</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP260422101"
                                        title="Epson 3256">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>6000.00</h3>
                                            <p>Qty: 10<br>Cost: 5,000.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">Epson 3256</b></div>
                                        <div class="product-code"><b class="sku">ABA1128PB101</b><b class="indexg"
                                                style="display:none;">E</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP190922102"
                                        title="HP MONITOR  LED 18.5 INCHES GYM">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>110.00</h3>
                                            <p>Qty: 100<br>Cost: 110.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">HP MONITOR LED 18.5 INCHES GYM</b>
                                        </div>
                                        <div class="product-code"><b class="sku">ABA1147PB128</b><b class="indexg"
                                                style="display:none;">H</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP190922101"
                                        title="HP MONITOR  LED 18.5 INCHES GYM">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>110.00</h3>
                                            <p>Qty: 90<br>Cost: 100.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">HP MONITOR LED 18.5 INCHES GYM</b>
                                        </div>
                                        <div class="product-code"><b class="sku">ABA1147PB127</b><b class="indexg"
                                                style="display:none;">H</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP170922101"
                                        title="HP MONITOR  LED 19.5 INCHES ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>19000.00</h3>
                                            <p>Qty: 2<br>Cost: 18,000.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">HP MONITOR LED 19.5 INCHES </b>
                                        </div>
                                        <div class="product-code"><b class="sku">ABA1146PB125</b><b class="indexg"
                                                style="display:none;">H</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP180922101"
                                        title="LENOVO LAPTOP CORE I3 10 GEN, 4GBR, 1TB HDD,15.6D,OS-10 IP SLIM 3">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>30000.00</h3>
                                            <p>Qty: 1<br>Cost: 25,000.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">LENOVO LAPTOP CORE I3 10 GEN, 4GBR,
                                                1TB HDD,15.6D,OS-10 IP SLIM 3</b></div>
                                        <div class="product-code"><b class="sku">ABA158PB126</b><b class="indexg"
                                                style="display:none;">L</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP230522101"
                                        title="MAXELL BATTERY CMOS   ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>500.00</h3>
                                            <p>Qty: 2<br>Cost: 500.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">MAXELL BATTERY CMOS </b></div>
                                        <div class="product-code"><b class="sku">ABA016PB106</b><b class="indexg"
                                                style="display:none;">M</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP120622103"
                                        title="TRANSCEND PEN DRIVE  Pendrive 128-GB Transcend 128GB Pendrive">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>650.00</h3>
                                            <p>Qty: 4<br>Cost: 460.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">TRANSCEND PEN DRIVE Pendrive 128-GB
                                                Transcend 128GB Pendrive</b></div>
                                        <div class="product-code"><b class="sku">ABA1133PB113</b><b class="indexg"
                                                style="display:none;">T</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP170122101"
                                        title="WESTERN  DIGITAL SSD M.2 120-GB  ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>16000.00</h3>
                                            <p>Qty: 1<br>Cost: 16,700.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">WESTERN DIGITAL SSD M.2 120-GB </b>
                                        </div>
                                        <div class="product-code"><b class="sku">ABA003PB89</b><b class="indexg"
                                                style="display:none;">W</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP050322101"
                                        title="WESTERN  DIGITAL SSD M.2 120-GB  ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>1300.00</h3>
                                            <p>Qty: 5<br>Cost: 1,200.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">WESTERN DIGITAL SSD M.2 120-GB </b>
                                        </div>
                                        <div class="product-code"><b class="sku">ABA083PB95</b><b class="indexg"
                                                style="display:none;">W</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP221221101"
                                        title="WESTERN  DIGITAL SSD M.2 120-GB MINI  ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>14000.00</h3>
                                            <p>Qty: 2<br>Cost: 12,000.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">WESTERN DIGITAL SSD M.2 120-GB MINI
                                            </b></div>
                                        <div class="product-code"><b class="sku">ABA004PB88</b><b class="indexg"
                                                style="display:none;">W</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP141221101"
                                        title="WESTERN  DIGITAL SSD SATA 240-GB  ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>15000.00</h3>
                                            <p>Qty: 10<br>Cost: 14,500.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">WESTERN DIGITAL SSD SATA 240-GB </b>
                                        </div>
                                        <div class="product-code"><b class="sku">ABA002PB83</b><b class="indexg"
                                                style="display:none;">W</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP110222101"
                                        title="WESTERN  DIGITAL SSD SATA 240-GB  ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>15500.00</h3>
                                            <p>Qty: 2<br>Cost: 15,000.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">WESTERN DIGITAL SSD SATA 240-GB </b>
                                        </div>
                                        <div class="product-code"><b class="sku">ABA002PB90</b><b class="indexg"
                                                style="display:none;">W</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP181221101"
                                        title="WESTERN  DIGITAL SSD SATA 240-GB  ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>15000.00</h3>
                                            <p>Qty: 1<br>Cost: 14,500.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">WESTERN DIGITAL SSD SATA 240-GB </b>
                                        </div>
                                        <div class="product-code"><b class="sku">ABA002PB86</b><b class="indexg"
                                                style="display:none;">W</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP231121101"
                                        title="WESTERN  DIGITAL SSD SATA 240-GB  ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>15000.00</h3>
                                            <p>Qty: 1<br>Cost: 14,500.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">WESTERN DIGITAL SSD SATA 240-GB </b>
                                        </div>
                                        <div class="product-code"><b class="sku">ABA002PB81</b><b class="indexg"
                                                style="display:none;">W</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP171221103"
                                        title="WESTERN  DIGITAL SSD SATA 240-GB  ">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>15000.00</h3>
                                            <p>Qty: 10<br>Cost: 14,500.00</p>
                                        </div>
                                        <div class="product-detail"><b class="name">WESTERN DIGITAL SSD SATA 240-GB </b>
                                        </div>
                                        <div class="product-code"><b class="sku">ABA002PB84</b><b class="indexg"
                                                style="display:none;">W</b></div>
                                    </div>
                                    <div class="product-content product-select selitem" id="AX_GP110822101"
                                        title="xiomi Mobile Phone 5201 Mobile Phone  Mobile">
                                        <img
                                            src="{{ asset('images/Screenshot (14).png') }}" class="product-image">
                                        <div class="info">
                                            <h3>30.00</h3>
                                            <p>Qty: 19<br>Cost: 17.50</p>
                                        </div>
                                        <div class="product-detail"><b class="name">xiomi Mobile Phone 5201 Mobile Phone
                                                Mobile</b></div>
                                        <div class="product-code"><b class="sku">ABA1130PB124</b><b class="indexg"
                                                style="display:none;">X</b></div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="box box-solid">
                    <div class="box-body">

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-user-o"></span></span>
                                            <span class="input-group-addon p-0"><a data-toggle="collapse" data-target="#walkcus"
                                                    class="accordion-toggle" id="walkin"
                                                    style="cursor: pointer; text-decoration:none;">-select-</a></span>
                                            <input type="text" class="form-control" id="cusname" value=""
                                                placeholder="Type Customer Code, Name Or Mobile No..." autocomplete="off">
                                            <span class="input-group-addon"><a id="addcus" style="cursor: pointer;"><span
                                                        class="fa fa-plus"></span></a></span>
                                        </div>
                                        <input type="hidden" name="cusid" id="cusid" class="form-control"
                                            value="" readonly="">
                                    </div>
                                </div>
                                <div class="col-md-3"><span style="font-size: 18px;color: red;font-weight: bold;">Bal.:
                                    </span><span style="font-size: 18px;color: blue;font-weight: bold;"
                                        id="cusbal">0.00</span></div>
                            </div>
                            <div class="row">
                                <div class="accordian-body collapse" id="walkcus">

                                    {{-- <div class="card card-solid">
                                        <div class="card-body">
                                            <form id="contactForm">
                                                <div class="form-row">
                                                <div class="form-group">
                                                    <label for="inputAddress">Name</label>
                                                    <input type="text" class="form-control" id="inputName" placeholder="Name..">
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="inputCName">Contact Name</label>
                                                  <input type="text" class="form-control" id="inputCName" placeholder="Contact Name...">
                                                </div>
                                                <div class="form-group">
                                                  <label for="inputNumber">Contact Number</label>
                                                  <input type="text" class="form-control" id="inputNumber" placeholder="Contact Number...">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="inputEmail">Email</label>
                                                    <input type="text" class="form-control" id="inputEmail" placeholder="Email...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputAddress">Address</label>
                                                    <input type="text" class="form-control" id="inputAddress" placeholder="Address...">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                              </form>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-md-6">
                                        <div class="form-group m-1">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-id-card-o"></span></span>
                                                <input type="text" id="walkname" maxlength="35" class="form-control"
                                                    value="Walk-In Customer" placeholder="Customer Name" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-1">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-mobile"></span></span>
                                                <input type="text" id="walkmobile" maxlength="18" class="form-control"
                                                    value="" placeholder="e.g. 016167xx7x" autocomplete="off">
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                            <input type="text" class="form-control" id="pcode"
                                                placeholder="e.g. Product Code or Name" autocomplete="off"> <span
                                                class="input-group-addon"><a id="addpro" style="cursor: pointer;"><span
                                                        class="fa fa-plus"></span></a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-barcode"></span></span>
                                            <input type="text" class="form-control" id="bcode"
                                                placeholder="e.g. Barcode" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="cart cart-sm m-1">
                                    <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                        <thead>
                                            <tr>
                                                <th width="30px">SN</th>
                                                <th width="214px">Item</th>
                                                <th width="72px">Qty</th>
                                                <th width="72px">Price</th>
                                                <th width="35px">ASL</th>
                                                <th width="77px">SubTotal</th>
                                                <th width="25px"><a class="empty" style="cursor: pointer;"><i
                                                            class="fa fa-trash"></i></a></th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <div class="cart-msg style-3 item" style="padding:0px;">
                                        <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                            <tbody id="itemdata">
                                                <tr>
                                                    <td colspan="7" class="text-center">There are no Estimate Item!
                                                    </td>
                                                </tr>
                                                <script>
                                                    $('.accordian-body').on('show.bs.collapse', function() {
                                                        $(this).closest('table').find('.collapse.in').not(this).collapse('toggle')
                                                    })
                                                </script>
                                            </tbody>
                                        </table>
                                    </div>
                                    <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                        <tfoot id="itemfoot"></tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="row" id="serialpro">


                            </div>

                            <div class="row" id="extra"></div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="rotate btn-cat-con">
            <button type="button" id="open-brands" class="btn btn-info open-brands" tabindex="-1">Brands</button>
            <button type="button" id="open-subcategory" class="btn btn-warning open-subcategory" tabindex="-1">Sub
                Categories</button>
            <button type="button" id="open-category" class="btn btn-primary open-category"
                tabindex="-1">Categories</button>
        </div> --}}

        {{-- <div id="brands-slider">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="form-group m-1">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-search"></span></span>
                            <input type="text" class="form-control form-control-lg" id="searchbrands"
                                placeholder="Search by Name" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div id="brands-list" class="ps-container style-2">
                <button id="brand_0" type="button" value="0" class="btn-prni brand" tabindex="-1">
                    <img src="{{ asset('images/Screenshot (14).png') }}" class="img-rounded img-thumbnail"><span>ALL
                        Brands</span></button>
                <button id="brand_3" type="button" value="3" class="btn-prni brand" tabindex="-1">
                    <img src="{{ asset('images/Screenshot (14).png') }}" class="img-rounded img-thumbnail"><span
                        class="bname">ACER</span></button>
                <button id="brand_57" type="button" value="57" class="btn-prni brand" tabindex="-1">
                    <img src="{{ asset('images/Screenshot (14).png') }}" class="img-rounded img-thumbnail"><span
                        class="bname">APACER</span></button>
                <button id="brand_59" type="button" value="59" class="btn-prni brand" tabindex="-1">
                    <img src="{{ asset('images/Screenshot (14).png') }}" class="img-rounded img-thumbnail"><span
                        class="bname">CANON</span></button>
                <button id="brand_20" type="button" value="20" class="btn-prni brand" tabindex="-1">
                    <img src="{{ asset('images/Screenshot (14).png') }}" class="img-rounded img-thumbnail"><span
                        class="bname">EPSON</span></button>
                <button id="brand_1" type="button" value="1" class="btn-prni brand" tabindex="-1">
                    <img src="{{ asset('images/Screenshot (14).png') }}" class="img-rounded img-thumbnail"><span
                        class="bname">HP</span></button>
                <button id="brand_5" type="button" value="5" class="btn-prni brand" tabindex="-1">
                    <img src="{{ asset('images/Screenshot (14).png') }}" class="img-rounded img-thumbnail"><span
                        class="bname">LENOVO</span></button>
                <button id="brand_89" type="button" value="89" class="btn-prni brand" tabindex="-1">
                    <img src="{{ asset('images/Screenshot (14).png') }}" class="img-rounded img-thumbnail"><span
                        class="bname">MAXELL</span></button>
                <button id="brand_56" type="button" value="56" class="btn-prni brand" tabindex="-1">
                    <img src="{{ asset('images/Screenshot (14).png') }}" class="img-rounded img-thumbnail"><span
                        class="bname">TRANSCEND</span></button>
                <button id="brand_95" type="button" value="95" class="btn-prni brand" tabindex="-1">
                    <img src="{{ asset('images/Screenshot (14).png') }}" class="img-rounded img-thumbnail"><span
                        class="bname">WALTON</span></button>
                <button id="brand_7" type="button" value="7" class="btn-prni brand" tabindex="-1">
                    <img src="{{ asset('images/Screenshot (14).png') }}" class="img-rounded img-thumbnail"><span
                        class="bname">WESTERN
                        DIGITAL</span></button>
                <button id="brand_164" type="button" value="164" class="btn-prni brand" tabindex="-1">
                    <img src="{{ asset('images/Screenshot (14).png') }}" class="img-rounded img-thumbnail"><span
                        class="bname">xiomi</span></button>
                <div class="ps-scrollbar-x-rail" style="width: 0px; display: none; left: 0px; bottom: 3px;">
                    <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; display: none; right: 3px;">
                    <div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div>
                </div>
            </div>
        </div> --}}

        {{-- <div id="category-slider">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="form-group m-1">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-search"></span></span>
                            <input type="text" class="form-control form-control-lg" id="searchcategory"
                                placeholder="Search by Name" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div id="category-list" class="ps-container style-2">
                <button id="category_0" type="button" value="0" class="btn-prni category" tabindex="-1"> <img
                     src="{{ asset('images/Screenshot (14).png') }}"
                        class="img-rounded img-thumbnail"><span>All
                        Categories</span></button>
                <button id="category_351" type="button" value="351" class="btn-prni category" tabindex="-1"> <img
                     src="{{ asset('images/Screenshot (14).png') }}"
                        class="img-rounded img-thumbnail"><span class="cname">1.2</span></button>
                <button id="category_360" type="button" value="360" class="btn-prni category" tabindex="-1"> <img
                     src="{{ asset('images/Screenshot (14).png') }}"
                        class="img-rounded img-thumbnail"><span class="cname">220~240AC 13A, 50/60Hz, Heavy-Duty
                        Multi-Plug</span></button>
                <button id="category_352" type="button" value="352" class="btn-prni category" tabindex="-1"> <img
                     src="{{ asset('images/Screenshot (14).png') }}"
                        class="img-rounded img-thumbnail"><span class="cname">4 Port
                        EPON</span></button>
                <button id="category_194" type="button" value="194" class="btn-prni category" tabindex="-1"> <img
                     src="{{ asset('images/Screenshot (14).png') }}"
                        class="img-rounded img-thumbnail"><span class="cname">CMOS</span></button>
                <button id="category_215" type="button" value="215" class="btn-prni category" tabindex="-1"> <img
                     src="{{ asset('images/Screenshot (14).png') }}"
                        class="img-rounded img-thumbnail"><span class="cname">CORE
                        I3</span></button>
                <button id="category_1" type="button" value="1" class="btn-prni category" tabindex="-1"> <img
                     src="{{ asset('images/Screenshot (14).png') }}"
                        class="img-rounded img-thumbnail"><span class="cname">LED</span></button>
                <button id="category_144" type="button" value="144" class="btn-prni category" tabindex="-1"> <img
                     src="{{ asset('images/Screenshot (14).png') }}"
                        class="img-rounded img-thumbnail"><span class="cname">LIDE-300</span></button>
                <button id="category_210" type="button" value="210" class="btn-prni category" tabindex="-1"> <img
                     src="{{ asset('images/Screenshot (14).png') }}"
                        class="img-rounded img-thumbnail"><span class="cname">M.2</span></button>
                <button id="category_347" type="button" value="347" class="btn-prni category" tabindex="-1"> <img
                     src="{{ asset('images/Screenshot (14).png') }}"
                        class="img-rounded img-thumbnail"><span class="cname">Mobile
                        Phone</span></button>
                <button id="category_353" type="button" value="353" class="btn-prni category" tabindex="-1"> <img
                     src="{{ asset('images/Screenshot (14).png') }}"
                        class="img-rounded img-thumbnail"><span class="cname">Pendrive</span></button>
                <button id="category_354" type="button" value="354" class="btn-prni category" tabindex="-1"> <img
                     src="{{ asset('images/Screenshot (14).png') }}"
                        class="img-rounded img-thumbnail"><span class="cname">Powerbank</span></button>
                <button id="category_209" type="button" value="209" class="btn-prni category" tabindex="-1">
                    <img src="{{ asset('images/Screenshot (14).png') }}"
                        class="img-rounded img-thumbnail"><span class="cname">SATA</span></button>
                <button id="category_104" type="button" value="104" class="btn-prni category" tabindex="-1">
                    <img src="{{ asset('images/Screenshot (14).png') }}"
                        class="img-rounded img-thumbnail"><span class="cname">W-4</span></button>
                <div class="ps-scrollbar-x-rail" style="width: 0px; display: none; left: 0px; bottom: 3px;">
                    <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; display: none; right: 3px;">
                    <div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div>
                </div>
            </div>
        </div> --}}

        {{-- <div id="subcategory-slider">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="form-group m-1">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-search"></span></span>
                            <input type="text" class="form-control form-control-lg" id="searchsubcategory"
                                placeholder="Search by Name" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div id="subcategory" class="ps-container style-2">

            </div>
        </div> --}}

        
    </section>

    {{-- <script>
        document.getElementById('addcus').addEventListener("click",function(){
            let displeyOpen = document.getElementById('walkcus');
            if(displeyOpen.style.display=='none'){
                displeyOpen.style.display='block';
            }
            else{
                displeyOpen.style.display='none';
            }
        });
    </script> --}}
@endsection
