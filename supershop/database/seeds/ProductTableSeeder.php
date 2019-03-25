<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    private $products;
    private $vendor;
    private $labels;

    public function __construct()
    {
        $this->vendor = 1;

        $this->labels = collect(['', '', '', '', '', '', 'Новинка', 'Хит продаж', 'Лучшая цена']);

        $this->products = collect([
            ['name' => 'Samsung Galaxy J8 2018', 'brand_id' => '1', 'category_id' => '1', 'price' => '16990'],
            ['name' => 'Samsung Galaxy J6 2018', 'brand_id' => '1', 'category_id' => '1', 'price' => '13990'],
            ['name' => 'Samsung Galaxy S8', 'brand_id' => '1', 'category_id' => '1', 'price' => '35990'],
            ['name' => 'Samsung Galaxy S8 plus', 'brand_id' => '1', 'category_id' => '1', 'price' => '37990'],
            ['name' => 'Samsung Galaxy S9', 'brand_id' => '1', 'category_id' => '1', 'price' => '42490'],
            ['name' => 'Samsung Galaxy S9 plus', 'brand_id' => '1', 'category_id' => '1', 'price' => '47490'],
            ['name' => 'Samsung Note 8', 'brand_id' => '1', 'category_id' => '1', 'price' => '59990'],
            ['name' => 'Samsung Note 9', 'brand_id' => '1', 'category_id' => '1', 'price' => '69990'],
            ['name' => 'Samsung Galaxy A8 plus', 'brand_id' => '1', 'category_id' => '1', 'price' => '27990'],
            ['name' => 'LG Q6', 'brand_id' => '2', 'category_id' => '1', 'price' => '14690'],
            ['name' => 'LG Q6 plus', 'brand_id' => '2', 'category_id' => '1', 'price' => '13990'],
            ['name' => 'LG G6', 'brand_id' => '2', 'category_id' => '1', 'price' => '26900'],
            ['name' => 'LG X power', 'brand_id' => '2', 'category_id' => '1', 'price' => '7900'],
            ['name' => 'LG G7 ThinQ', 'brand_id' => '2', 'category_id' => '1', 'price' => '6900'],
            ['name' => 'LG V30 plus', 'brand_id' => '2', 'category_id' => '1', 'price' => '30550'],
            ['name' => 'Xiaomi Mi6X', 'brand_id' => '3', 'category_id' => '1', 'price' => '14540'],
            ['name' => 'Xiaomi Mi A2 Lite', 'brand_id' => '3', 'category_id' => '1', 'price' => '10870'],
            ['name' => 'Xiaomi Redmi 5', 'brand_id' => '3', 'category_id' => '1', 'price' => '10570'],
            ['name' => 'Xiaomi Redmi S2', 'brand_id' => '3', 'category_id' => '1', 'price' => '9900'],
            ['name' => 'Xiaomi Mi Mix 2', 'brand_id' => '3', 'category_id' => '1', 'price' => '21470'],
            ['name' => 'Xiaomi Pocophone F1', 'brand_id' => '3', 'category_id' => '1', 'price' => '21770'],
            ['name' => 'Sony Xperia XZ3', 'brand_id' => '4', 'category_id' => '1', 'price' => '69990'],
            ['name' => 'Sony Xperia XA2 plus', 'brand_id' => '4', 'category_id' => '1', 'price' => '24490'],
            ['name' => 'Sony Xperia XZ2 Premium', 'brand_id' => '4', 'category_id' => '1', 'price' => '79990'],
            ['name' => 'Sony Xperia XZ2 Compact', 'brand_id' => '4', 'category_id' => '1', 'price' => '39490'],

            ['name' => 'Lenovo Yoga C930', 'brand_id' => '5', 'category_id' => '2', 'price' => '89587'],
            ['name' => 'Lenovo V130 15', 'brand_id' => '5', 'category_id' => '2', 'price' => '17890'],
            ['name' => 'Lenovo Ideapad 120s 11', 'brand_id' => '5', 'category_id' => '2', 'price' => '19800'],
            ['name' => 'Lenovo ThinkPad P52', 'brand_id' => '5', 'category_id' => '2', 'price' => '114630'],
            ['name' => 'Lenovo Legion Y730 15', 'brand_id' => '5', 'category_id' => '2', 'price' => '92475'],
            ['name' => 'Lenovo Yoga 530 14 Intel', 'brand_id' => '5', 'category_id' => '2', 'price' => '32140'],
            ['name' => 'Acer ASPIRE 7', 'brand_id' => '6', 'category_id' => '2', 'price' => '78990'],
            ['name' => 'Acer Spin 3', 'brand_id' => '6', 'category_id' => '2', 'price' => '38390'],
            ['name' => 'Acer SWIFT 7', 'brand_id' => '6', 'category_id' => '2', 'price' => '139381'],
            ['name' => 'Acer Nitro 5', 'brand_id' => '6', 'category_id' => '2', 'price' => '65760'],
            ['name' => 'Acer ASPIRE 3', 'brand_id' => '6', 'category_id' => '2', 'price' => '16990'],
            ['name' => 'Acer Predator Helios 500', 'brand_id' => '6', 'category_id' => '2', 'price' => '137060'],
            ['name' => 'ASUS TUF Gaming FX705GD', 'brand_id' => '7', 'category_id' => '2', 'price' => '63421'],
            ['name' => 'ASUS TUF Gaming FX505GM', 'brand_id' => '7', 'category_id' => '2', 'price' => '76340'],
            ['name' => 'ASUS X441MA', 'brand_id' => '7', 'category_id' => '2', 'price' => '20650'],
            ['name' => 'ASUS VivoBook S15 S530UF', 'brand_id' => '7', 'category_id' => '2', 'price' => '42650'],
            ['name' => 'ASUS VivoBook 14 X405UQ', 'brand_id' => '7', 'category_id' => '2', 'price' => '73626'],
            ['name' => 'DELL PRECISION 7730', 'brand_id' => '8', 'category_id' => '2', 'price' => '176371'],
            ['name' => 'DELL INSPIRON 7375 2-in-1', 'brand_id' => '8', 'category_id' => '2', 'price' => '47000'],
            ['name' => 'HP Chromebook 14 G5', 'brand_id' => '9', 'category_id' => '2', 'price' => '21976'],
            ['name' => 'HP ZBook Studio G5', 'brand_id' => '9', 'category_id' => '2', 'price' => '129910'],
            ['name' => 'Xiaomi Mi Notebook Pro 15.6', 'brand_id' => '3', 'category_id' => '2', 'price' => '59500'],
            ['name' => 'Xiaomi Mi Notebook Air 13.3 2018', 'brand_id' => '3', 'category_id' => '2', 'price' => '60800'],

            ['name' => 'МФУ HP DeskJet Ink Advantage 5275', 'brand_id' => '9', 'category_id' => '3', 'price' => '6875'],
            ['name' => 'Принтер HP LaserJet Pro M104w', 'brand_id' => '9', 'category_id' => '3', 'price' => '6943'],
            ['name' => 'МФУ HP Color LaserJet Pro MFP M280nw', 'brand_id' => '9', 'category_id' => '3', 'price' => '20058'],
            ['name' => 'Принтер Canon i-SENSYS LBP611Cn', 'brand_id' => '10', 'category_id' => '3', 'price' => '9829'],
            ['name' => 'МФУ Canon i-SENSYS MF421dw', 'brand_id' => '10', 'category_id' => '3', 'price' => '21720'],
            ['name' => 'МФУ Canon PIXMA G2411', 'brand_id' => '10', 'category_id' => '3', 'price' => '9712'],
            ['name' => 'МФУ Epson L382', 'brand_id' => '11', 'category_id' => '3', 'price' => '13547'],
            ['name' => 'МФУ Epson Expression Photo XP-8500', 'brand_id' => '11', 'category_id' => '3', 'price' => '13120'],
            ['name' => 'Принтер Epson Stylus Photo R1800', 'brand_id' => '11', 'category_id' => '3', 'price' => '79000'],
            ['name' => 'МФУ Xerox WorkCentre 3225DNI', 'brand_id' => '12', 'category_id' => '3', 'price' => '17320'],
            ['name' => 'Принтер Xerox Phaser 3260DNI', 'brand_id' => '12', 'category_id' => '3', 'price' => '9850'],
            ['name' => 'МФУ Xerox WorkCentre 7525', 'brand_id' => '12', 'category_id' => '3', 'price' => '13200'],
            ['name' => 'МФУ Xerox WorkCentre 6515DN', 'brand_id' => '12', 'category_id' => '3', 'price' => '31819'],
            ['name' => 'Принтер Samsung Xpress M2020W', 'brand_id' => '1', 'category_id' => '3', 'price' => '5239'],
            ['name' => 'МФУ Samsung Xpress M2870FD', 'brand_id' => '1', 'category_id' => '3', 'price' => '17423'],

            ['name' => 'Philips 55PUS6412', 'brand_id' => '13', 'category_id' => '4', 'price' => '57899'],
            ['name' => 'Philips 49PUS6412', 'brand_id' => '13', 'category_id' => '4', 'price' => '43500'],
            ['name' => 'Philips 246E9QJAB', 'brand_id' => '13', 'category_id' => '4', 'price' => '10010'],
            ['name' => 'Philips 328E8QJAB5', 'brand_id' => '13', 'category_id' => '4', 'price' => '18279'],
            ['name' => 'Panasonic TX-43FXR610', 'brand_id' => '14', 'category_id' => '4', 'price' => '38841'],
            ['name' => 'Panasonic TX-49FXR610', 'brand_id' => '14', 'category_id' => '4', 'price' => '52447'],
            ['name' => 'Panasonic TX-32ER250ZZ', 'brand_id' => '14', 'category_id' => '4', 'price' => '14490'],
            ['name' => 'Panasonic TX-65DXR900', 'brand_id' => '14', 'category_id' => '4', 'price' => '26990'],
            ['name' => 'Samsung UE43J5202AU', 'brand_id' => '1', 'category_id' => '4', 'price' => '23290'],
            ['name' => 'Samsung UE65NU7640S', 'brand_id' => '1', 'category_id' => '4', 'price' => '103500'],
            ['name' => 'Samsung C34H890WJI', 'brand_id' => '1', 'category_id' => '4', 'price' => '39520'],
            ['name' => 'LG 28MT49S-PZ', 'brand_id' => '2', 'category_id' => '4', 'price' => '17167'],
            ['name' => 'LG 70UU640C', 'brand_id' => '2', 'category_id' => '4', 'price' => '179990'],
            ['name' => 'LG 55UK6400', 'brand_id' => '2', 'category_id' => '4', 'price' => '47590'],
            ['name' => 'Acer Nitro RG240Ybmiix', 'brand_id' => '6', 'category_id' => '4', 'price' => '11700'],
            ['name' => 'Acer XZ271UAbmiiphzx', 'brand_id' => '6', 'category_id' => '4', 'price' => '36740'],
            ['name' => 'ASUS VS247NR', 'brand_id' => '7', 'category_id' => '4', 'price' => '7724'],
            ['name' => 'ASUS ROG Swift PG258Q', 'brand_id' => '7', 'category_id' => '4', 'price' => '43500'],
            ['name' => 'Sony KD-65AF9', 'brand_id' => '4', 'category_id' => '4', 'price' => '449990'],
            ['name' => 'Sony KDL-43WF804', 'brand_id' => '4', 'category_id' => '4', 'price' => '38090'],

            ['name' => 'Bosch KGN39VI21R', 'brand_id' => '15', 'category_id' => '5', 'price' => '49990'],
            ['name' => 'Bosch KGN36VL21R', 'brand_id' => '15', 'category_id' => '5', 'price' => '41990'],
            ['name' => 'Bosch KGN39VT21R', 'brand_id' => '15', 'category_id' => '5', 'price' => '42190'],
            ['name' => 'Hitachi R-M702GPU2XMBW', 'brand_id' => '16', 'category_id' => '5', 'price' => '316950'],
            ['name' => 'Hitachi R-M702PU2GS', 'brand_id' => '16', 'category_id' => '5', 'price' => '207950'],
            ['name' => 'Hitachi R-M702GPU2GBK', 'brand_id' => '16', 'category_id' => '5', 'price' => '285950'],
            ['name' => 'Hitachi R-M702AGPU4XDIA', 'brand_id' => '16', 'category_id' => '5', 'price' => '358950'],
            ['name' => 'Gorenje NRK6192CRD4', 'brand_id' => '17', 'category_id' => '5', 'price' => '67320'],
            ['name' => 'Gorenje NRS 85728 RD', 'brand_id' => '17', 'category_id' => '5', 'price' => '68900'],
            ['name' => 'Samsung RF50K5920S8', 'brand_id' => '1', 'category_id' => '5', 'price' => '139999'],
            ['name' => ' Samsung RT-35 K5440S8', 'brand_id' => '1', 'category_id' => '5', 'price' => '40560'],
            ['name' => 'LG GC-B247 JEUV', 'brand_id' => '2', 'category_id' => '5', 'price' => '81728'],

            ['name' => 'Samsung MC28M6055CK', 'brand_id' => '1', 'category_id' => '6', 'price' => '15790'],
            ['name' => 'Samsung MG23K3575AS', 'brand_id' => '1', 'category_id' => '6', 'price' => '9490'],
            ['name' => 'Samsung FG87SBTR', 'brand_id' => '1', 'category_id' => '6', 'price' => '17190'],
            ['name' => 'Samsung ME83KRW-1', 'brand_id' => '1', 'category_id' => '6', 'price' => '5990'],
            ['name' => 'Samsung MC28H5013AW', 'brand_id' => '1', 'category_id' => '6', 'price' => '8990'],
            ['name' => 'Samsung ME83XR', 'brand_id' => '1', 'category_id' => '6', 'price' => '7660'],
            ['name' => 'LG MW-25R95CIS', 'brand_id' => '2', 'category_id' => '6', 'price' => '12094'],
            ['name' => 'LG MW-25R95GIR', 'brand_id' => '2', 'category_id' => '6', 'price' => '10371'],
            ['name' => 'LG MW-23R35GIB', 'brand_id' => '2', 'category_id' => '6', 'price' => '9160'],
            ['name' => 'LG MH-6336GISW', 'brand_id' => '2', 'category_id' => '6', 'price' => '12499'],
            ['name' => 'Panasonic NN-GF574M', 'brand_id' => '14', 'category_id' => '6', 'price' => '15790'],
            ['name' => 'Panasonic NN-CS894B', 'brand_id' => '14', 'category_id' => '6', 'price' => '44500'],

            ['name' => 'Hotpoint-Ariston FA3 841 H BL', 'brand_id' => '18', 'category_id' => '7', 'price' => '17939'],
            ['name' => 'Hotpoint-Ariston FI7 861 SH BL', 'brand_id' => '18', 'category_id' => '7', 'price' => '28128'],
            ['name' => 'Hotpoint-Ariston OL 1038 LI RFH', 'brand_id' => '18', 'category_id' => '7', 'price' => '29000'],
            ['name' => 'Bosch HBF534EB0R', 'brand_id' => '15', 'category_id' => '7', 'price' => '24990'],
            ['name' => 'Bosch HBA23BN21', 'brand_id' => '15', 'category_id' => '7', 'price' => '37000'],
            ['name' => 'Bosch HBG633BS1', 'brand_id' => '15', 'category_id' => '7', 'price' => '59390'],
            ['name' => 'Gorenje BO 71 SY2W', 'brand_id' => '17', 'category_id' => '7', 'price' => '22900'],
            ['name' => 'Gorenje BO 635E20 B', 'brand_id' => '17', 'category_id' => '7', 'price' => '19650'],
            ['name' => 'Gorenje BO 73 CLB', 'brand_id' => '17', 'category_id' => '7', 'price' => '30390'],
            ['name' => 'Gorenje BO 71 SY2B', 'brand_id' => '17', 'category_id' => '7', 'price' => '21131'],
            ['name' => 'Samsung NV75K5541RB', 'brand_id' => '1', 'category_id' => '7', 'price' => '35990'],
            ['name' => 'Samsung NV75K5541RS', 'brand_id' => '1', 'category_id' => '7', 'price' => '39990'],

            ['name' => 'Bosch PKF651FP1E', 'brand_id' => '15', 'category_id' => '8', 'price' => '17490'],
            ['name' => 'Bosch Serie 2 PBP6C5B90', 'brand_id' => '15', 'category_id' => '8', 'price' => '13490'],
            ['name' => 'Bosch PPP6A6M90R', 'brand_id' => '15', 'category_id' => '8', 'price' => '27400'],
            ['name' => 'Bosch PUE611FB1E', 'brand_id' => '15', 'category_id' => '8', 'price' => '27990'],
            ['name' => 'Bosch PIF645FB1E', 'brand_id' => '15', 'category_id' => '8', 'price' => '38880'],
            ['name' => 'Bosch PKE345CA1', 'brand_id' => '15', 'category_id' => '8', 'price' => '14350'],
            ['name' => 'Gorenje ECT 322 BCSC', 'brand_id' => '17', 'category_id' => '8', 'price' => '11800'],
            ['name' => 'Gorenje GW 65 CLI', 'brand_id' => '17', 'category_id' => '8', 'price' => '16980'],
            ['name' => 'Gorenje ECT 644 BCSC', 'brand_id' => '17', 'category_id' => '8', 'price' => '15107'],
            ['name' => 'Gorenje IT 612 SY2W', 'brand_id' => '17', 'category_id' => '8', 'price' => '24660'],
            ['name' => 'Hotpoint-Ariston HAR 642 DO X', 'brand_id' => '18', 'category_id' => '8', 'price' => '19140'],
            ['name' => 'Hotpoint-Ariston IKIA 640 C', 'brand_id' => '18', 'category_id' => '8', 'price' => '23990'],

            ['name' => 'Bosch HKA090150', 'brand_id' => '15', 'category_id' => '9', 'price' => '29750'],
            ['name' => 'Bosch HGB330E50Q', 'brand_id' => '15', 'category_id' => '9', 'price' => '42990'],
            ['name' => 'Bosch HGA128D60R', 'brand_id' => '15', 'category_id' => '9', 'price' => '34456'],
            ['name' => 'Bosch HCA623150', 'brand_id' => '15', 'category_id' => '9', 'price' => '34000'],
            ['name' => 'Bosch HCA744660', 'brand_id' => '15', 'category_id' => '9', 'price' => '59990'],
            ['name' => 'Candy TRIO 9503', 'brand_id' => '19', 'category_id' => '9', 'price' => '66960'],
            ['name' => 'Candy TRIO 9501 X', 'brand_id' => '19', 'category_id' => '9', 'price' => '71280'],
            ['name' => 'Candy TRIO 9503 X', 'brand_id' => '19', 'category_id' => '9', 'price' => '82328'],
            ['name' => 'Bosch HGA34W365', 'brand_id' => '15', 'category_id' => '9', 'price' => '36990'],
            ['name' => 'Hotpoint-Ariston H5G56F', 'brand_id' => '18', 'category_id' => '9', 'price' => '22642'],
            ['name' => 'Hotpoint-Ariston HT5VM4A', 'brand_id' => '18', 'category_id' => '9', 'price' => '25830'],
            ['name' => 'Hotpoint-Ariston H5VSH2A (X)', 'brand_id' => '18', 'category_id' => '9', 'price' => '29837'],

            ['name' => 'Bosch WIW 28540', 'brand_id' => '15', 'category_id' => '10', 'price' => '69490'],
            ['name' => 'Bosch WLG 2416 S', 'brand_id' => '15', 'category_id' => '10', 'price' => '25000'],
            ['name' => 'Bosch WLG 20060', 'brand_id' => '15', 'category_id' => '10', 'price' => '18450'],
            ['name' => 'Bosch WAW 32540', 'brand_id' => '15', 'category_id' => '10', 'price' => '75000'],
            ['name' => 'Samsung WD90N74LNOA/LP', 'brand_id' => '1', 'category_id' => '10', 'price' => '74990'],
            ['name' => 'Samsung WW90M74LNOO', 'brand_id' => '1', 'category_id' => '10', 'price' => '69990'],
            ['name' => 'Samsung WF8590NLM9DY', 'brand_id' => '1', 'category_id' => '10', 'price' => '18290'],
            ['name' => 'Samsung WW90M74LNOA', 'brand_id' => '1', 'category_id' => '10', 'price' => '64119'],
            ['name' => 'LG LSWD100', 'brand_id' => '2', 'category_id' => '10', 'price' => '300000'],
            ['name' => 'LG F-1096ND3', 'brand_id' => '2', 'category_id' => '10', 'price' => '22812'],
            ['name' => 'Candy CST G270L/1', 'brand_id' => '19', 'category_id' => '10', 'price' => '22723'],
            ['name' => 'Candy EVOT 10071 D', 'brand_id' => '19', 'category_id' => '10', 'price' => '41800'],

            ['name' => 'ARMANI CODE Туалетная вода', 'brand_id' => '20', 'category_id' => '11', 'price' => '2612'],
            ['name' => 'ARMANI PRIVE Cuir Amethyste Парфюмерная вода', 'brand_id' => '20', 'category_id' => '11', 'price' => '14366'],
            ['name' => 'ARMANI CODE PROFUMO Парфюмерная вода', 'brand_id' => '20', 'category_id' => '11', 'price' => '2742'],
            ['name' => 'ARMANI CODE Donna Парфюмерная вода', 'brand_id' => '20', 'category_id' => '11', 'price' => '2934'],
            ['name' => 'CHANEL BLEU DE CHANEL', 'brand_id' => '21', 'category_id' => '11', 'price' => '6150'],
            ['name' => 'CHANEL GABRIELLE', 'brand_id' => '21', 'category_id' => '11', 'price' => '4965'],
            ['name' => 'CHANEL COCO MADEMOISELLE', 'brand_id' => '21', 'category_id' => '11', 'price' => '6900'],
            ['name' => 'Dior Homme Туалетная вода', 'brand_id' => '22', 'category_id' => '11', 'price' => '4095'],
            ['name' => 'Dior Homme Eau for Men Туалетная вода', 'brand_id' => '22', 'category_id' => '11', 'price' => '4065'],
            ['name' => 'Miss Dior Eau de Parfum Парфюмерная вода', 'brand_id' => '22', 'category_id' => '11', 'price' => '3862'],
            ['name' => 'AQUA KENZO POUR HOMME Туалетная вода', 'brand_id' => '23', 'category_id' => '11', 'price' => '2745'],
            ['name' => 'KENZO HOMME Парфюмерная вода', 'brand_id' => '23', 'category_id' => '11', 'price' => '3852'],
            ['name' => 'KENZO WORLD Парфюмерная вода', 'brand_id' => '23', 'category_id' => '11', 'price' => '3592'],
            ['name' => 'Be Delicious Fresh Blossom Парфюмерная вода', 'brand_id' => '24', 'category_id' => '11', 'price' => '2966'],
            ['name' => 'Be Delicious Парфюмерная вода', 'brand_id' => '24', 'category_id' => '11', 'price' => '2373'],
            ['name' => 'Be Tempted Парфюмерная вода', 'brand_id' => '24', 'category_id' => '11', 'price' => '2952'],

            ['name' => 'Губная помада Color Riche', 'brand_id' => '25', 'category_id' => '12', 'price' => '395'],
            ['name' => 'Тональный крем Alliance Perfect, Совершенное слияние', 'brand_id' => '25', 'category_id' => '12', 'price' => '464'],
            ['name' => 'Тушь для ресниц Объем миллиона ресниц От Кутюр', 'brand_id' => '25', 'category_id' => '12', 'price' => '784'],
            ['name' => 'Пудра Alliance Perfect, Совершенное слияние', 'brand_id' => '25', 'category_id' => '12', 'price' => '474'],
            ['name' => 'Профессиональный набор для дизайна бровей Brow Artist', 'brand_id' => '25', 'category_id' => '12', 'price' => '694'],
            ['name' => 'Тушь для ресниц 2000 Calorie Dramatic Volume', 'brand_id' => '26', 'category_id' => '12', 'price' => '280'],
            ['name' => 'Основа компактная суперустойчивая Facefinity Compact', 'brand_id' => '26', 'category_id' => '12', 'price' => '698'],
            ['name' => 'Карандаш тональный Panstik', 'brand_id' => '26', 'category_id' => '12', 'price' => '289'],
            ['name' => 'Тени для век Masterpiece Nude Palette', 'brand_id' => '26', 'category_id' => '12', 'price' => '580'],
            ['name' => 'ROUGE PUR COUTURE', 'brand_id' => '29', 'category_id' => '12', 'price' => '2839'],
            ['name' => 'VERNIS A LEVRES THE HOLOGRAPHICS', 'brand_id' => '29', 'category_id' => '12', 'price' => '2981'],
            ['name' => 'COUTURE PALETTE', 'brand_id' => '29', 'category_id' => '12', 'price' => '4592'],
            ['name' => 'ROUGE COCO', 'brand_id' => '21', 'category_id' => '12', 'price' => '2145'],
            ['name' => 'ROUGE ALLURE INK', 'brand_id' => '21', 'category_id' => '12', 'price' => '2367'],
            ['name' => 'DIOR DIORSHOW MONO', 'brand_id' => '22', 'category_id' => '12', 'price' => '1860'],
            ['name' => 'DIOR DIORSHOW ICONIC OVERCURL', 'brand_id' => '22', 'category_id' => '12', 'price' => '2480'],

            ['name' => 'ФИТОБАНЯ Обновляющий скраб-маска для лица', 'brand_id' => '30', 'category_id' => '13', 'price' => '69'],
            ['name' => 'Мягкий скраб для лица Малина и брусника', 'brand_id' => '30', 'category_id' => '13', 'price' => '49'],
            ['name' => 'Очищающий скраб для лица Абрикосовые косточки', 'brand_id' => '30', 'category_id' => '13', 'price' => '47'],
            ['name' => 'Лосьон-тоник для всех типов кожи Витаминный', 'brand_id' => '30', 'category_id' => '13', 'price' => '52'],
            ['name' => 'PURETE THERMALE УНИВЕРСАЛЬНОЕ ОЧИЩАЮЩЕЕ СРЕДСТВО 3 В 1', 'brand_id' => '31', 'category_id' => '13', 'price' => '1080'],
            ['name' => 'PURETE THERMALE СОВЕРШЕНСТВУЮЩИЙ ТОНИК', 'brand_id' => '31', 'category_id' => '13', 'price' => '1065'],
            ['name' => 'PURETE THERMALE ОЧИЩАЮЩАЯ ПЕНКА, ПРИДАЮЩАЯ СИЯНИЕ', 'brand_id' => '31', 'category_id' => '13', 'price' => '963'],
            ['name' => 'PURETE THERMALE МИЦЕЛЛЯРНЫЙ ЛОСЬОН ДЛЯ СНЯТИЯ МАКИЯЖА', 'brand_id' => '31', 'category_id' => '13', 'price' => '956'],
            ['name' => 'ROSALIAC GEL', 'brand_id' => '32', 'category_id' => '13', 'price' => '1528'],
            ['name' => 'TOLERIANE', 'brand_id' => '32', 'category_id' => '13', 'price' => '1422'],
            ['name' => 'HYDRAPHASE INTENSE LEGERE', 'brand_id' => '32', 'category_id' => '13', 'price' => '1545'],

            ['name' => 'КИСТЬ 139S DUO FIBRE TAPERED FACE', 'brand_id' => '34', 'category_id' => '14', 'price' => '3250'],
            ['name' => 'КИСТЬ КОСМЕТИЧЕСКАЯ 268S DUO FIBRE ANGLED FACE BRUSH', 'brand_id' => '34', 'category_id' => '14', 'price' => '2250'],
            ['name' => 'КИСТЬ КОСМЕТИЧЕСКАЯ 208S ANGLED BROW', 'brand_id' => '34', 'category_id' => '14', 'price' => '1620'],
            ['name' => 'КИСТЬ 161S DUO FIBRE FACE GLIDER', 'brand_id' => '34', 'category_id' => '14', 'price' => '2730'],

            ['name' => 'Ручка шариковая Pilot Bps-gp-medium, 1,0 мм, черная', 'brand_id' => '35', 'category_id' => '15', 'price' => '71'],
            ['name' => 'Ручка шариковая Pilot Supergrip, 1,0 мм, синяя', 'brand_id' => '35', 'category_id' => '15', 'price' => '83'],
            ['name' => 'Ручка гелевая Pilot Frixion Rro', 'brand_id' => '35', 'category_id' => '15', 'price' => '221'],
            ['name' => 'Parker Jotter - Black K60', 'brand_id' => '36', 'category_id' => '15', 'price' => '1092'],
            ['name' => 'Parker Premier - Brown PGT', 'brand_id' => '36', 'category_id' => '15', 'price' => '43050'],
            ['name' => 'Parker Sonnet - Matte Black GT', 'brand_id' => '36', 'category_id' => '15', 'price' => '14980'],
            ['name' => 'Ручка шариковая BIC Orange Grip fine синяя 0,8 мм, 20 шт', 'brand_id' => '37', 'category_id' => '15', 'price' => '590'],
            ['name' => 'Карандаш чернографитный Faber-Castell Grip 2001 НВ', 'brand_id' => '38', 'category_id' => '15', 'price' => '86'],
            ['name' => 'Карандаш чернографитный Faber-Castell 2B', 'brand_id' => '38', 'category_id' => '15', 'price' => '99'],
            ['name' => 'Карандаш графич.эскизный KOH-I-NOOR 1500 8В', 'brand_id' => '39', 'category_id' => '15', 'price' => '19'],
            ['name' => 'Карандаш графич.эскизный KOH-I-NOOR 1500 2B', 'brand_id' => '39', 'category_id' => '15', 'price' => '35'],

            ['name' => 'ТЕТРАДЬ ЛИНЕЙКА 12 ЛИСТОВ', 'brand_id' => '41', 'category_id' => '16', 'price' => '4'],
            ['name' => 'ТЕТРАДЬ клетка 48 листов', 'brand_id' => '42', 'category_id' => '16', 'price' => '45'],
            ['name' => 'ТЕТРАДЬ линейка 48 листов', 'brand_id' => '42', 'category_id' => '16', 'price' => '45'],
            ['name' => 'ТЕТРАДЬ клетка 96 листов', 'brand_id' => '42', 'category_id' => '16', 'price' => '105'],

            ['name' => 'Невская палитра Краски акриловые Ладога 12 цветов', 'brand_id' => '43', 'category_id' => '17', 'price' => '969'],
            ['name' => 'Набор акварельных красок Ладога 24 кюветы в картоне', 'brand_id' => '43', 'category_id' => '17', 'price' => '798'],
            ['name' => 'Краски акварельные медовые Мультики, с кистью, 12 цветов', 'brand_id' => '44', 'category_id' => '17', 'price' => '55'],
            ['name' => 'Гамма Акварель медовая Чудо-краски 24 цвета', 'brand_id' => '44', 'category_id' => '17', 'price' => '116'],

            ['name' => 'Скрепки канцелярские 28 мм без покрытия 100 штук', 'brand_id' => '45', 'category_id' => '18', 'price' => '42'],
            ['name' => 'Кнопки канцелярские металлические стальные (100 штук в упаковке)', 'brand_id' => '45', 'category_id' => '18', 'price' => '84'],

            ['name' => 'ФИКУС БЕНЖАМИНА КИНКИ', 'brand_id' => '47', 'category_id' => '20', 'price' => '400'],
            ['name' => 'ФИКУС БЕНЖАМИНА МИДНАЙТ ЛЕДИ', 'brand_id' => '47', 'category_id' => '20', 'price' => '5800'],
            ['name' => 'ФИКУС БЕНЖАМИНА СТАРЛАЙТ', 'brand_id' => '47', 'category_id' => '20', 'price' => '3700'],
            ['name' => 'ФИКУС ЛИРАТА', 'brand_id' => '47', 'category_id' => '20', 'price' => '3400'],
            ['name' => 'ЗАМИАКУЛЬКАС', 'brand_id' => '47', 'category_id' => '20', 'price' => '1500'],
            ['name' => 'НЕФРОЛЕПИС', 'brand_id' => '47', 'category_id' => '20', 'price' => '1100'],
            ['name' => 'ДРАЦЕНА ВАРНЕСКИ БРАНЧ', 'brand_id' => '47', 'category_id' => '20', 'price' => '20900'],
            ['name' => 'ФАЛЕНОПСИС БЕЛЫЙ 2 ЦВЕТОНОСА', 'brand_id' => '47', 'category_id' => '20', 'price' => '4000'],
            ['name' => 'ФАЛЕНОПСИС РОЗОВЫЙ 2 ЦВЕТОНОСА', 'brand_id' => '47', 'category_id' => '20', 'price' => '4000'],

            ['name' => 'Букет роз 9 штук', 'brand_id' => '46', 'category_id' => '19', 'price' => '999'],
            ['name' => 'Букет роз 27 штук', 'brand_id' => '46', 'category_id' => '19', 'price' => '1699'],
            ['name' => 'Букет роз 49 штук', 'brand_id' => '46', 'category_id' => '19', 'price' => '2399'],
            ['name' => 'Букет роз 101 штука', 'brand_id' => '46', 'category_id' => '19', 'price' => '5199'],
            ['name' => 'Букет тюльпанов 21 штука', 'brand_id' => '46', 'category_id' => '19', 'price' => '1011'],
            ['name' => 'Букет пионов 7 штук', 'brand_id' => '46', 'category_id' => '19', 'price' => '789'],
            ['name' => 'Букет с ромашками летний', 'brand_id' => '46', 'category_id' => '19', 'price' => '587'],

            ['name' => 'Аммобиум крылатый 0,2 г', 'brand_id' => '48', 'category_id' => '21', 'price' => '15'],
            ['name' => 'Арктотис Арлекин 0,2 г', 'brand_id' => '48', 'category_id' => '21', 'price' => '15'],
            ['name' => 'Астра Аполло 0,3 г игольчатая', 'brand_id' => '48', 'category_id' => '21', 'price' => '12'],
            ['name' => 'Астра Мацумото белая с син. краем 0,3 г', 'brand_id' => '48', 'category_id' => '21', 'price' => '17'],
            ['name' => 'Петрушка корневая Сахарная', 'brand_id' => '49', 'category_id' => '21', 'price' => '8'],
            ['name' => 'Лук порей Карантанский', 'brand_id' => '49', 'category_id' => '21', 'price' => '19'],
            ['name' => 'Малина Полька', 'brand_id' => '49', 'category_id' => '21', 'price' => '28']
        ]);
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->products as $product) {
            DB::table('products')->insert([
                'name' => $product['name'],
                'vendor' => str_pad($this->vendor, 7, '0', STR_PAD_LEFT),
                'slug' => Transliterate::make($product['name'], ['type' => 'url', 'lowercase' => true]),
                'brand_id' => $product['brand_id'],
                'category_id' => $product['category_id'],
                'price' => $product['price'],
                'qty' => \rand(10, 1000),
                'label' => $this->labels->random()
            ]);

            $this->vendor ++;
        }
    }
}