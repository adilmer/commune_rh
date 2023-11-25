<html>

<head>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta name=Generator content="Microsoft Word 15 (filtered)">
    <title>نموذج بطاقة التنقيط الفردية(*)</title>
    <style>
        .page-break {
            page-break-before: always;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 3px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 3px;
        }
    </style>
<script>

        window.print();

    window.addEventListener('afterprint', function() {
        history.back();
    });
</script>
</head>

<body lang=EN-US style='word-wrap:break-word'>
@foreach ($agents as $annee=>$data)
@foreach ($data as $key=>$agent)
@php
//dd($agents);
$situation_fam = "";
    if ($agent->situation_fam == "Célibataire" ) {
        $situation_fam = "عازب(ة)";
    }
    if ($agent->situation_fam =="Marié" ) {
        $situation_fam = "متزوج(ة)";
    }
    if ($agent->situation_fam =="Divorcé" ) {
        $situation_fam = "مطلق(ة)";
    }
    if ($agent->situation_fam =="Veuf" ) {
        $situation_fam = "أرمل(ة)";
    }

@endphp

    <div class=WordSection1>



        <p class=MsoHeader dir=RTL style='margin-right:-13.65pt;text-align:right;
direction:rtl;unicode-bidi:embed'><span
                style='position:absolute;z-index:251661824;
left:0px;margin-left:-3px;margin-top:4px;width:190px;height:36px'>
                <h4>............ طانطان في </h4>
            </span></p>

        <p style='font-size:9.0pt;line-height:20% ;text-align:right;'>المملكة المغربية</p>
        <p style='font-size:9.0pt;line-height:20%;text-align:right;'>وزارة الداخلية </p>
        <p style='font-size:9.0pt;line-height:20%;text-align:right;'>عمالةاقليم طانطان</p>
        <p style='font-size:9.0pt;line-height:20%;text-align:right;'>جماعة طانطان</p>
        <p style='font-size:18.0pt;line-height:100%; text-align: center;'><b>بطاقة التنقيط الفردية </b></p>
        <p style='font-size:15.0pt;line-height:100%; text-align: center;'><b> السنة <span>{{$annee}}</span></b></p>
        <p style='font-size:8.5pt;line-height:100%; text-align: center;'><b> (الملحق رقم 1 المرفق بقرار وزير تحديث
                القطاعات العامة رقم 1725.06 بتاريخ 28 يوليوز 2006)</b></p>





        <table >
            <tr>
                <th>
                    <p class=MsoNormal dir=RTL
                        style='text-align:right;line-height:75%;direction:
			rtl;unicode-bidi:embed'><span
                            dir=RTL></span><span lang=AR-SA
                            style='font-size:
			14.0pt;line-height:75%;font-family:"Traditional Arabic",serif'><span
                                dir=RTL></span>1-
                            هوية الموظف</span></p>
                </th>
            </tr>

            <tr>
                <td>
                    <p style='font-size:11.0pt;line-height:40% ;text-align:center;margin-top: 10px;'><span>{{$agent->ppr}}</span> :
                        رقم التأجير -</p>
                    <p style='font-size:11.0pt;line-height:40% ;text-align:center;margin-top: 5px;'><span>{{$agent->cin}}</span> : رقم
                        ب.ت.و -</p>
                    <p style='font-size:11.0pt;line-height:40% ;text-align:right;margin-top: 5px;'>
                        الإسم الكامل  : <span>{{$agent->nom_ar}}</span> - </p>
                    <p style='font-size:11.0pt;line-height:40% ;text-align:right;margin-top: 5px;'><span>{{$agent->date_naiss->format('d/m/Y')}}</span> :
                        تاريخ الإزدياد -</p>
                    <p style='font-size:11.0pt;line-height:40% ;text-align:right;margin-top: 5px;'><span>{{$agent->lieu_naiss}}</span> :
                        مكان الإزدياد -</p>
                    <p style='font-size:11.0pt;line-height:40% ;text-align:right;margin-top: 5px;'> الحالة العائلية :<span style="margin-left:20px "> {{$situation_fam}} </span>عدد
                        الأطفال : </span><span>{{$agent->nbr_enfant}}</span> - </p>
                    <p style='font-size:11.0pt;line-height:40% ;text-align:right;margin-top: 5px;'> الدرجة ومقر التعيين :
                        <span style="margin-left:20px "> {{$agent->grade->nom_grade_ar}} </span> بطـانطان -</p>
                    <p style='font-size:11.0pt;line-height:40% ;text-align:right;margin-top: 5px;'><span>{{$agent->date_grade->format('d/m/Y')}}</span> :
                        تاريخ التعيين في الدرجة -</p>
                    <p style='font-size:11.0pt;line-height:40% ;text-align:right;margin-top: 5px;'>
                        <span>{{$agent->date_echellon->format('d/m/Y')}} : </span>الرتبة والأقدمية  : <span  style="margin-left:20px ">{{$agent->echellon}}</span>  منذ -</p>
                    <p style='font-size:11.0pt;line-height:40% ;text-align:right;margin-top: 5px; margin-bottom: 10px;'>
                        <span>{{$agent->date_rec->format('d/m/Y')}}</span> : تاريخ ولوج الوظيفة العمومية -</p>


            </tr>
            <tr>
                <td>
                    <p class=MsoNormal dir=RTL
                        style='text-align:right;line-height:75%;direction:
		rtl;unicode-bidi:embed'><span
                            dir=RTL></span><span lang=AR-SA
                            style='font-size:
		14.0pt;line-height:75%;font-family:"Traditional Arabic",serif'><span
                                dir=RTL></span>2-
                            النقطة الممنوحة</span></p>
                </td>
            </tr>

            <tr>
                <td>
                    <table class="table" dir="rtl">
                        <thead>
                            <tr>
                                <th></th>
                                <th>عناصر التنقيط</th>
                                <th>سلم التنقيط</th>
                                <th>النقط الممنوحة</th>
                                <th>ملاحظات </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>إنجاز المهام المرتبطة بالوظيفة</td>
                                <td>من 0 الى 5</td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>المردودية</td>
                                <td>من 0 الى 5</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>القدرة على التنظيم</td>
                                <td>من 0 الى 3</td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>السلوك المهني</td>
                                <td>من 0 الى 4</td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>البحث والابتكار</td>
                                <td>من 0 الى 3</td>
                                <td> </td>
                                <td> </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td> </td>
                                <td>مجموع النقط الجزئية (من 0 إلى 20)</td>
                                <td>20</td>
                                <td> </td>
                                <td> </td>

                            </tr>
                        </tfoot>
                    </table>
            </tr>
            </td>
            </tr>

            <tr>
                <td>
                    <p class=MsoNormal dir=RTL
                        style='text-align:right;line-height:75%;direction:
			rtl;unicode-bidi:embed'><span
                            dir=RTL></span><span lang=AR-SA
                            style='font-size:
			14.0pt;line-height:75%;font-family:"Traditional Arabic",serif'><span
                                dir=RTL></span>3-الميزة
                            الممنوحة:</span></p>
                </td>
            </tr>

            <tr>
                <td>
                    <p class=MsoNormal dir=RTL
                        style='text-align:right;line-height:75%;direction:
	rtl;unicode-bidi:embed'><span
                            dir=RTL></span><span lang=AR-SA
                            style='font-size:
	14.0pt;line-height:75%;font-family:"Traditional Arabic",serif'><span
                                dir=RTL></span>
                            ممتاز                       جيد جدا                     جيد
                            متوسط                                  ضعيف</span></p>
                    <p class=MsoNormal dir=RTL
                        style='text-align:right;line-height:75%;direction:
	rtl;unicode-bidi:embed'><span
                            dir=RTL></span><span lang=AR-SA
                            style='font-size:
	14.0pt;line-height:75%;font-family:"Traditional Arabic",serif'><span
                                dir=RTL></span>(20</span><span lang=AR-SA
                            style='font-size:14.0pt;line-height:75%'>≥</span><span lang=AR-SA
                            style='font-size:14.0pt;line-height:75%;font-family:"Traditional Arabic",serif'>
                            نقطة </span><span lang=AR-SA style='font-size:14.0pt;line-height:75%'>≥</span><span
                            lang=AR-SA
                            style='font-size:14.0pt;line-height:75%;font-family:"Traditional Arabic",serif'>18)
                            (18  &lt;نقطة </span><span lang=AR-SA style='font-size:14.0pt;line-height:75%'>≥</span><span
                            lang=AR-SA
                            style='font-size:14.0pt;line-height:75%;font-family:"Traditional Arabic",serif'>16)
                            (16&lt; نقطة </span><span lang=AR-SA style='font-size:14.0pt;line-height:75%'>≥</span><span
                            lang=AR-SA
                            style='font-size:14.0pt;line-height:75%;font-family:"Traditional Arabic",serif'>14)
                            (14&lt; نقطة </span><span lang=AR-SA style='font-size:14.0pt;line-height:75%'>≥</span><span
                            lang=AR-SA
                            style='font-size:14.0pt;line-height:75%;font-family:"Traditional Arabic",serif'>10)
                            (10&lt; نقطة)</span></p>
                </td>

            </tr>

            <tr>
                <td>
                    <p class=MsoNormal dir=RTL
                        style='text-align:right;line-height:75%;direction:
	rtl;unicode-bidi:embed'><span
                            dir=RTL></span><span lang=AR-SA
                            style='font-size:
	14.0pt;line-height:75%;font-family:"Traditional Arabic",serif'><span
                                dir=RTL></span>4-
                            معدل النقط المحصل عليها:</span></p>
                </td>
            </tr>
            <tr>
                <td>

                    <p class=MsoNormal dir=RTL
                        style='text-align:right;line-height:75%;direction:
		rtl;unicode-bidi:embed'><span lang=FR
                            dir=LTR style='font-size:14.0pt;
		line-height:75%'>&nbsp;</span></p>

                    <p class=MsoNormal dir=RTL
                        style='text-align:right;line-height:75%;direction:
		rtl;unicode-bidi:embed'><span lang=AR-SA
                            style='font-size:14.0pt;line-height:
		75%;font-family:"Traditional Arabic",serif'>تذكير
                            بمعدل النقط المحصل عليها خلال
                            السنوات المطلوبة للترقية في الرتبة:</span></p>

                    <p class=MsoNormal dir=RTL
                        style='text-align:right;line-height:75%;direction:
		rtl;unicode-bidi:embed'><span lang=AR-SA
                            style='font-size:14.0pt;line-height:
		75%;font-family:"Traditional Arabic",serif'>السنة
                            الأولى:
                            ...................................................
                            السنة      :...............................................</span></p>

                    <p class=MsoNormal dir=RTL
                        style='text-align:right;line-height:75%;direction:
		rtl;unicode-bidi:embed'><span lang=AR-SA
                            style='font-size:14.0pt;line-height:
		75%;font-family:"Traditional Arabic",serif'>السنة
                            :
                            ...................................................
                            السنة      :...............................................</span></p>

                    <p class=MsoNormal dir=RTL
                        style='text-align:right;line-height:75%;direction:
		rtl;unicode-bidi:embed'><span lang=AR-SA
                            style='font-size:14.0pt;line-height:
		75%;font-family:"Traditional Arabic",serif'>معدل
                            النقط المحصل
                            عليها:               20/</span></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class=MsoNormal dir=RTL
                        style='text-align:right;line-height:75%;direction:
	rtl;unicode-bidi:embed'><span
                            dir=RTL></span><span lang=AR-SA
                            style='font-size:
	14.0pt;line-height:75%;font-family:"Traditional Arabic",serif'><span
                                dir=RTL></span>5-
                            نسق الترقية في الرتبة:</span></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class=MsoNormal dir=RTL
                        style='text-align:right;line-height:75%;direction:
	rtl;unicode-bidi:embed'><span
                            dir=RTL></span><span lang=AR-SA
                            style='font-size:
	14.0pt;line-height:75%;font-family:"Traditional Arabic",serif'><span
                                dir=RTL></span>
                            سريع
                            متوسط                                      بطيء   </span></p>

                    <p class=MsoNormal dir=RTL
                        style='text-align:right;line-height:75%;direction:
	rtl;unicode-bidi:embed'><span
                            dir=RTL></span><span lang=AR-SA
                            style='font-size:
	14.0pt;line-height:75%;font-family:"Traditional Arabic",serif'><span
                                dir=RTL></span>16
                        </span><span lang=AR-SA style='font-size:14.0pt;line-height:75%'>≤</span><span lang=AR-SA
                            style='font-size:14.0pt;line-height:75%;font-family:"Traditional Arabic",serif'>
                            نقطة                             16 &lt;النقطة </span><span lang=AR-SA
                            style='font-size:14.0pt;line-height:75%'>≥</span><span lang=AR-SA
                            style='font-size:14.0pt;line-height:75%;font-family:"Traditional Arabic",serif'>
                            10                              10 &lt; نقطة</span></p>



                </td>
            </tr>
        </table>
        <p class=MsoNormal align=right dir=RTL
            style='text-align:left;line-height:60%;
direction:rtl;unicode-bidi:embed'><b><span lang=AR-SA
                    style='font-size:24.0pt;
line-height:60%;font-family:"Traditional Arabic",serif'>إمضاء رئيس
                    الجماعة</span></b></p>


    </div>
    <div class="page-break"></div>
    @endforeach
    @endforeach
</body>

</html>
