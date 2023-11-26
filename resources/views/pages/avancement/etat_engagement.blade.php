@extends('templates.vide')

@section('style')
    html { font-family:Calibri, Arial, Helvetica, sans-serif; font-size:11pt; background-color:white }
    a.comment-indicator:hover + div.comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em }
    a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em }
    div.comment { display:none }
    table { border-collapse:collapse; page-break-after:always }
    .gridlines td { border:1px dotted black }
    .gridlines th { border:1px dotted black }
    .b { text-align:center }
    .e { text-align:center }
    .f { text-align:right }
    .inlineStr { text-align:left }
    .n { text-align:right }
    .s { text-align:left }
    td.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
    th.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
    td.style1 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style1 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style2 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style2 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style3 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style3 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style4 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style4 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style5 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style5 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style6 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style6 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; font-style:italic; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style7 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style7 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style8 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; text-decoration:underline; color:#D8D8D8; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style8 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; text-decoration:underline; color:#D8D8D8; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style9 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; text-decoration:underline; color:#7F7F7F; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style9 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; text-decoration:underline; color:#7F7F7F; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style10 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial Narrow'; font-size:14pt; background-color:white }
    th.style10 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial Narrow'; font-size:14pt; background-color:white }
    td.style11 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial Narrow'; font-size:14pt; background-color:white }
    th.style11 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Arial Narrow'; font-size:14pt; background-color:white }
    td.style12 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style12 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style13 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style13 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style14 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style14 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style15 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Lucida Calligraphy'; font-size:10pt; background-color:#FFFFFF }
    th.style15 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Lucida Calligraphy'; font-size:10pt; background-color:#FFFFFF }
    td.style16 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Lucida Calligraphy'; font-size:10pt; background-color:#FFFFFF }
    th.style16 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Lucida Calligraphy'; font-size:10pt; background-color:#FFFFFF }
    td.style17 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Lucida Calligraphy'; font-size:10pt; background-color:#FFFFFF }
    th.style17 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Lucida Calligraphy'; font-size:10pt; background-color:#FFFFFF }
    td.style18 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style18 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style19 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style19 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style20 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style20 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style21 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style21 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style22 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Lucida Calligraphy'; font-size:10pt; background-color:#FFFFFF }
    th.style22 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Lucida Calligraphy'; font-size:10pt; background-color:#FFFFFF }
    td.style23 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Lucida Calligraphy'; font-size:10pt; background-color:#FFFFFF }
    th.style23 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Lucida Calligraphy'; font-size:10pt; background-color:#FFFFFF }
    td.style24 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Lucida Calligraphy'; font-size:10pt; background-color:#FFFFFF }
    th.style24 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Lucida Calligraphy'; font-size:10pt; background-color:#FFFFFF }
    td.style25 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style25 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style26 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style26 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style27 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style27 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style28 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style28 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style29 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Lucida Calligraphy'; font-size:10pt; background-color:#FFFFFF }
    th.style29 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Lucida Calligraphy'; font-size:10pt; background-color:#FFFFFF }
    td.style30 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Lucida Calligraphy'; font-size:10pt; background-color:#FFFFFF }
    th.style30 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Lucida Calligraphy'; font-size:10pt; background-color:#FFFFFF }
    td.style31 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Lucida Calligraphy'; font-size:10pt; background-color:#FFFFFF }
    th.style31 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Lucida Calligraphy'; font-size:10pt; background-color:#FFFFFF }
    td.style32 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style32 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style33 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style33 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style34 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style34 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style35 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style35 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style36 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style36 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style37 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style37 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style38 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style38 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style39 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style39 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style40 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style40 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style41 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style41 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style42 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style42 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style43 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style43 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style44 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style44 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style45 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style45 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style46 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style46 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style47 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style47 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style48 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style48 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style49 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style49 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style50 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style50 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style51 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style51 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style52 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style52 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style53 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style53 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style54 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style54 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style55 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-style:italic; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style55 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-style:italic; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style56 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style56 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-style:italic; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style57 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-style:italic; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style57 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-style:italic; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style58 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-style:italic; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style58 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-style:italic; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style59 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style59 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style60 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style60 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style61 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style61 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style62 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style62 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style63 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style63 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style64 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style64 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style65 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style65 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style66 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style66 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style67 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style67 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style68 { vertical-align:middle; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style68 { vertical-align:middle; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style69 { vertical-align:middle; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style69 { vertical-align:middle; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style70 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:12pt; background-color:white }
    th.style70 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:12pt; background-color:white }
    td.style71 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:12pt; background-color:white }
    th.style71 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:12pt; background-color:white }
    td.style72 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:12pt; background-color:white }
    th.style72 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:12pt; background-color:white }
    td.style73 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style73 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style74 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style74 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style75 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style75 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style76 { vertical-align:middle; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style76 { vertical-align:middle; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style77 { vertical-align:middle; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style77 { vertical-align:middle; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style78 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#FFFFFF; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style78 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#FFFFFF; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style79 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#FFFFFF; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style79 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#FFFFFF; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style80 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style80 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style81 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style81 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style82 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style82 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style83 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style83 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style84 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style84 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style85 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FFFFFF; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style85 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FFFFFF; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style86 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#FFFFFF; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style86 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#FFFFFF; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style87 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style87 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style88 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style88 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style89 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style89 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style90 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
    th.style90 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
    td.style91 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
    th.style91 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
    td.style92 { vertical-align:top; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style92 { vertical-align:top; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style93 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:11pt; background-color:white }
    th.style93 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:11pt; background-color:white }
    td.style94 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style94 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style95 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style95 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style96 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style96 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style97 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style97 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style98 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style98 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style99 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style99 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style100 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style100 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style101 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style101 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style102 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style102 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style103 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style103 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style104 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style104 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style105 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FFFFFF; font-family:'Calibri'; font-size:11pt; background-color:white }
    th.style105 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FFFFFF; font-family:'Calibri'; font-size:11pt; background-color:white }
    td.style106 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FFFFFF; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style106 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FFFFFF; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style107 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FFFFFF; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style107 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FFFFFF; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style108 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#FFFFFF; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style108 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#FFFFFF; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style109 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style109 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style110 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style110 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style111 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style111 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style112 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style112 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style113 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style113 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style114 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style114 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style115 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Arial Narrow'; font-size:12pt; background-color:white }
    th.style115 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Arial Narrow'; font-size:12pt; background-color:white }
    td.style116 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style116 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style117 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style117 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style118 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style118 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style119 { vertical-align:middle; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style119 { vertical-align:middle; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style120 { vertical-align:middle; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style120 { vertical-align:middle; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style121 { vertical-align:middle; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style121 { vertical-align:middle; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style122 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style122 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style123 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style123 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style124 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style124 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style125 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style125 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style126 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style126 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style127 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style127 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style128 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style128 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style129 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style129 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style130 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style130 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style131 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style131 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style132 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style132 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style133 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style133 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style134 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style134 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style135 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style135 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style136 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style136 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style137 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style137 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style138 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style138 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style139 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style139 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style140 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style140 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style141 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style141 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style142 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style142 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style143 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style143 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style144 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style144 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style145 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style145 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style146 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style146 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style147 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style147 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style148 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style148 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style149 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style149 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style150 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style150 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style151 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style151 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style152 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style152 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style153 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style153 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style154 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style154 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style155 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style155 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style156 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style156 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style157 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style157 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style158 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style158 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style159 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style159 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style160 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style160 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style161 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style161 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style162 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style162 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style163 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style163 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style164 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style164 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style165 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style165 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style166 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style166 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style167 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style167 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style168 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style168 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style169 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style169 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style170 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style170 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style171 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:12pt; background-color:#FFFFFF }
    th.style171 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:12pt; background-color:#FFFFFF }
    td.style172 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style172 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style173 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style173 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style174 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style174 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style175 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style175 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style176 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style176 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style177 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style177 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style178 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style178 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style179 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style179 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style180 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style180 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style181 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style181 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style182 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    th.style182 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:white }
    td.style183 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Andalus'; font-size:8pt; background-color:#FFFFFF }
    th.style183 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Andalus'; font-size:8pt; background-color:#FFFFFF }
    td.style184 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Andalus'; font-size:8pt; background-color:#FFFFFF }
    th.style184 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#FF0000; font-family:'Andalus'; font-size:8pt; background-color:#FFFFFF }
    td.style185 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#FF0000; font-family:'Andalus'; font-size:8pt; background-color:#FFFFFF }
    th.style185 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#FF0000; font-family:'Andalus'; font-size:8pt; background-color:#FFFFFF }
    td.style186 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Andalus'; font-size:8pt; background-color:#FFFFFF }
    th.style186 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#FF0000; font-family:'Andalus'; font-size:8pt; background-color:#FFFFFF }
    td.style187 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#FF0000; font-family:'Andalus'; font-size:8pt; background-color:#FFFFFF }
    th.style187 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#FF0000; font-family:'Andalus'; font-size:8pt; background-color:#FFFFFF }
    td.style188 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
    th.style188 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
    td.style189 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
    th.style189 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
    td.style190 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
    th.style190 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
    td.style191 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    th.style191 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    td.style192 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    th.style192 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    td.style193 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    th.style193 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    td.style194 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style194 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style195 { vertical-align:middle; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style195 { vertical-align:middle; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style196 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style196 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style197 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style197 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style198 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style198 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style199 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
    th.style199 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
    td.style200 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
    th.style200 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
    td.style201 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    th.style201 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    td.style202 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    th.style202 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    td.style203 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    th.style203 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    td.style204 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    th.style204 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    td.style205 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style205 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style206 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style206 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style207 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style207 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style208 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style208 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style209 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style209 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style210 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style210 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style211 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    th.style211 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    td.style212 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    th.style212 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    td.style213 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    th.style213 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    td.style214 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style214 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style215 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style215 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style216 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
    th.style216 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:#FFFFFF }
    td.style217 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    th.style217 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial Narrow'; font-size:8pt; background-color:#FFFFFF }
    td.style218 { vertical-align:middle; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style218 { vertical-align:middle; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style219 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style219 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    td.style220 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    th.style220 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial Narrow'; font-size:10pt; background-color:#FFFFFF }
    table.sheet0 col.col0 { width:42pt }
    table.sheet0 col.col1 { width:42pt }
    table.sheet0 col.col2 { width:42pt }
    table.sheet0 col.col3 { width:42pt }
    table.sheet0 col.col4 { width:42pt }
    table.sheet0 col.col5 { width:42pt }
    table.sheet0 col.col6 { width:42pt }
    table.sheet0 col.col7 { width:42pt }
    table.sheet0 col.col8 { width:42pt }
    table.sheet0 col.col9 { width:42pt }
    table.sheet0 col.col10 { width:42pt }
    table.sheet0 col.col11 { width:42pt }
    table.sheet0 col.col12 { width:42pt }
    table.sheet0 col.col13 { width:25.07777749pt }
    table.sheet0 col.col14 { width:42pt }
    table.sheet0 col.col15 { width:42pt }
    table.sheet0 col.col16 { width:42pt }
    table.sheet0 col.col17 { width:42pt }
    table.sheet0 col.col18 { width:42pt }
    table.sheet0 col.col19 { width:42pt }
    table.sheet0 col.col20 { width:42pt }
    table.sheet0 col.col21 { width:42pt }
    table.sheet0 col.col22 { width:44.05555505pt }
    table.sheet0 col.col23 { width:128.09999853pt }
    table.sheet0 col.col24 { width:42pt }
    table.sheet0 col.col25 { width:42pt }
    table.sheet0 col.col26 { width:7.45555547pt }
    table.sheet0 col.col27 { width:42pt }
    table.sheet0 col.col28 { width:6.7777777pt }
    table.sheet0 col.col29 { width:42pt }
    table.sheet0 col.col30 { width:8.81111101pt }
    table.sheet0 col.col31 { width:12.19999986pt }
    table.sheet0 col.col32 { width:37.95555512pt }
    table.sheet0 col.col33 { width:42pt }
    table.sheet0 col.col34 { width:42pt }
    table.sheet0 tr { height:15pt }
    table.sheet0 tr.row0 { height:18pt }
    table.sheet0 tr.row13 { height:16.5pt }
    table.sheet0 tr.row14 { height:15.75pt }
    table.sheet0 tr.row15 { height:15.75pt }
    table.sheet0 tr.row16 { height:17.25pt }
    table.sheet0 tr.row21 { height:15.75pt }
    table.sheet0 tr.row22 { height:15.75pt }
    table.sheet0 tr.row25 { height:15.75pt }
    table.sheet0 tr.row26 { height:15.75pt }
    table.sheet0 tr.row29 { height:15.75pt }
    table.sheet0 tr.row30 { height:15.75pt }
    table.sheet0 tr.row31 { height:15.75pt }
    table.sheet0 tr.row32 { height:15.75pt }
    table.sheet0 tr.row36 { height:15.75pt }
    table.sheet0 tr.row41 { height:15.75pt }
    table.sheet0 tr.row45 { height:18.75pt }
    table.sheet0 tr.row55 { height:15.75pt }
    table.sheet0 tr.row56 { height:15.75pt }



    @media print {
        body {
          font-family: Arial, sans-serif;
          font-size: 12pt;
          line-height: 1.5;
        }

        /* Additional styling for your content */
        /* Add your styles for headers, footers, etc. here */

        @page {
          size: A4;
          margin: 1cm; /* Adjust margins as needed */
        }
      }

    @endsection
@section('content')
<div class="row">
    <div class="">

        @php
            $dateD = \Carbon\Carbon::parse($avancement->dateD);
            $date = \Carbon\Carbon::parse('01-'.$dateD->format('m-Y'));
            $month = $date->addDays(-1)->format('m');
            $month = 12;

        @endphp
        <table style="direction: ltr" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
            <col class="col0">
            <col class="col1">
            <col class="col2">
            <col class="col3">
            <col class="col4">
            <col class="col5">
            <col class="col6">
            <col class="col7">
            <col class="col8">
            <col class="col9">
            <col class="col10">
            <col class="col11">
            <col class="col12">
            <col class="col13">
            <col class="col14">
            <col class="col15">
            <col class="col16">
            <col class="col17">
            <col class="col18">
            <col class="col19">
            <col class="col20">
            <col class="col21">
            <col class="col22">
            <col class="col23">
            <col class="col24">
            <col class="col25">
            <col class="col26">
            <col class="col27">
            <col class="col28">
            <col class="col29">
            <col class="col30">
            <col class="col31">
            <col class="col32">
            <col class="col33">
            <col class="col34">
            <tbody>
              <tr class="row0">
                <td class="column0 style1 s style3" colspan="9" rowspan="5">Royaume du Maroc <br>Ministère de l'interieur <br>Région Guelmim-oued noun <br>Province Tan Tan <br>Commune de Tan Tan</td>
                <td class="column9 style4 null style5" colspan="4"></td>
                <td class="column13 style6 s"  colspan="6">CIN : {{$agent->cin}}</td>
                <td class="column14 style7 s style7"></td>
                <td class="column20 style8 null"></td>
                <td class="column21 style8 null"></td>
                <td class="column22 style8 null"></td>
                <td class="column23 style8 null"></td>
                <td class="column24 style8 null"></td>
                <td class="column25 style8 null"></td>
                <td class="column26 style8 null"></td>
                <td class="column27 style9 s style9" colspan="8">Numéro Somme :{{$agent->ppr}}</td>
                <td class="column31 style10 n style11"></td>
              </tr>
              <tr class="row1">
                <td class="column9 style15 s style31" colspan="16" rowspan="3">ETAT D'ENGAGEMENT</td>
                <td class="column25 style18 s style19" colspan="5">Matricule  :</td>
                <td class="column30 style20 n style20" colspan="4">{{$agent->mat}}</td>
                <td class="column34 style21 null"></td>
              </tr>
              <tr class="row2">
                <td class="column25 style25 s style33" colspan="7" rowspan="2">EXERCICE</td>
                <td class="column32 style27 n style34" colspan="2" rowspan="2">{{date('Y')}}</td>
                <td class="column34 style28 null style35" rowspan="2"></td>
              </tr>
              <tr class="row3">
              </tr>
              <tr class="row4">
                <td class="column9 style39 s style39" colspan="6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Année de naissance:</td>
                <td class="column15 style40 n style42" colspan="5">{{$agent->date_naiss->format('Y-m-d')}}</td>
                <td class="column20 style43 null style46" colspan="15"></td>
              </tr>
              <tr class="row5">
                <td class="column0 style47 n style64" colspan="9" rowspan="9"></td>
                <td class="column9 style39 s style39" colspan="6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Affiliation à la Mutuelle:</td>
                <td class="column15 style39 s style39" colspan="5">{{$agent->aff_mutuelle}}</td>
                <td class="column20 style50 s style50" colspan="6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nom et prénom:</td>
                <td class="column26 style39 s style51" colspan="9">{{$agent->nom_fr}}</td>
              </tr>
              <tr class="row6">
                <td class="column9 style43 s style52" colspan="11">&nbsp;Situation Nouvelle:</td>
                <td class="column20 style18 s style19" colspan="6">Rubrique :</td>
                <td class="column26 style53 s style54" colspan="9">02 . 10 . 20 . 10/11</td>
              </tr>
              <tr class="row7">
                <td class="column9 style50 s style50" colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Etat civil</td>
                <td class="column13 style39 s style39" colspan="4">Enfants</td>
                <td class="column17 style39 s style39" colspan="3">Indice</td>
                <td class="column20 style50 s style50" colspan="7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Grade et résidence:</td>
                <td class="column27 style39 s style51" colspan="8">{{$Nagent->grade->nom_grade_fr}}</td>
              </tr>
              <tr class="row8">
                <td class="column9 style39 s style39" colspan="4">{{$Nagent->situation_fam}}</td>
                <td class="column13 style55 n style55" colspan="4">{{$Nagent->nbr_enfant}}</td>
                <td class="column17 style56 n style58" colspan="3">{{$Nagent->indice}}</td>
                <td class="column20 style50 s style50" colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Echelle :</td>
                <td class="column24 style39 n style39" colspan="3">{{$Nagent->echelle}}</td>
                <td class="column27 style39 s style39" colspan="3">à la M/TT</td>
                <td class="column30 style39 s style39" colspan="3">titulaire</td>
                <td class="column33 style43 null style59" colspan="2"></td>
              </tr>
              <tr class="row9">
                <td class="column9 style43 s style52" colspan="11">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Situation Ancienne:</td>
                <td class="column20 style43 s style59" colspan="15">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Situation Nouvelle:</td>
              </tr>
              <tr class="row10">
                <td class="column9 style50 s style50" colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Etat civil</td>
                <td class="column13 style39 s style39" colspan="4">Enfants</td>
                <td class="column17 style39 s style39" colspan="3">Indice</td>
                <td class="column20 style50 s style50" colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Echelle :</td>
                <td class="column24 style39 n style39" colspan="3">{{$Nagent->echelle}}</td>
                <td class="column27 style39 s style39" colspan="3">echelon:</td>
                <td class="column30 style60 s">{{$Nagent->echellon}}</td>
                <td class="column31 style39 s style39" colspan="2">Indice:</td>
                <td class="column33 style43 n style59" colspan="2">{{$Nagent->indice}}</td>
              </tr>
              <tr class="row11">
                <td class="column9 style61 s style61" colspan="4">{{$agent->situation_fam}}</td>
                <td class="column13 style55 n style55" colspan="4">{{$agent->nbr_enfant}}</td>
                <td class="column17 style56 n style58" colspan="3">{{$agent->indice}}</td>
                <td class="column20 style50 s style50" colspan="7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Situation Ancienne:</td>
                <td class="column27 style39 s style51" colspan="8">{{$agent->grade->nom_grade_fr}}</td>
              </tr>
              <tr class="row12">
                <td class="column9 style43 s style44" colspan="6">Affiliation à la Mutuelle:</td>
                <td class="column15 style39 s style39" colspan="5">{{$agent->aff_mutuelle}}</td>
                <td class="column20 style50 s style50" colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Echelle :</td>
                <td class="column24 style39 n style39" colspan="3">{{$agent->echelle}}</td>
                <td class="column27 style43 s style52" colspan="3">&nbsp;echelon:</td>
                <td class="column30 style60 n">{{$agent->echellon}}</td>
                <td class="column31 style39 s style39" colspan="2">Indice:</td>
                <td class="column33 style39 n style51" colspan="2">{{$agent->indice}}</td>
              </tr>
              <tr class="row13">
                <td class="column9 style65 s style65" colspan="4">Date d'effet:</td>
                <td class="column13 style66 n style66" colspan="7">{{$Navancement->dateD}}</td>
                <td class="column20 style65 s style65" colspan="4">Banque</td>
                <td class="column24 style67 n style69" colspan="3">{{$agent->agence}}</td>
                <td class="column27 style70 n style72" colspan="8">{{$agent->rib}}</td>
              </tr>
              <tr class="row14">
                <td class="column0 style73 s style75" colspan="20">Décompte annuel compaeé des émoluments</td>
                <td class="column20 style76 null"></td>
                <td class="column21 style77 null"></td>
                <td class="column22 style78 s style79" colspan="13">RECLASSEMENT AU GRADE DE</td>
              </tr>
              <tr class="row15">
                <td class="column0 style80 s style89" colspan="9" rowspan="2">Nature des élements modifié</td>
                <td class="column9 style73 s style75" colspan="8">Montant Annuel</td>
                <td class="column17 style80 s style89" colspan="3" rowspan="2">Diff</td>
                <td class="column20 style83 null"></td>
                <td class="column21 style84 null"></td>
                <td class="column22 style85 f style86" colspan="13">{{$Nagent->grade->nom_grade_fr}}</td>
              </tr>
              <tr class="row16">
                <td class="column9 style73 s style75" colspan="4">Ancien</td>
                <td class="column13 style73 s style75" colspan="4">Nouveau</td>
                <td class="column20 style90 null"></td>
                <td class="column21 style90 null"></td>
                <td class="column23 style91 s" colspan="11">Regularisation d'avancement au {{$Nagent->echellon}}° echelon</td>
                <td class="column33 style84 null"></td>
                <td class="column34 style94 null"></td>
              </tr>
              <tr class="row17">
                <td class="column0 style95 s style97" colspan="9">Traitement de base</td>
                <td class="column9 style98 n style100" colspan="4">{{number_format($avancement->Traitement_base(), 2, '.', ' ')}}</td>
                <td class="column13 style98 n style100" colspan="4">{{number_format($Navancement->Traitement_base(), 2, '.', ' ')}}</td>
                <td class="column17 style101 n style103" colspan="3">{{number_format($Navancement->Traitement_base() - $avancement->Traitement_base(), 2, '.', ' ')}}</td>
                <td class="column20 style83 null"></td>
                <td class="column21 style104 f style104" colspan="5"></td>
                <td class="column26 style105 null"></td>
                <td class="column27 style106 n style106" colspan="4"></td>
                <td class="column31 style107 null"></td>
                <td class="column32 style107 null"></td>
                <td class="column33 style107 null"></td>
                <td class="column34 style108 null"></td>
              </tr>
              <tr class="row18">
                <td class="column0 style109 s style111" colspan="9">Indemnité de résidence</td>
                <td class="column9 style101 n style100" colspan="4">{{number_format($avancement->Indim_residence(), 2, '.', ' ')}}</td>
                <td class="column13 style101 n style100" colspan="4">{{number_format($Navancement->Indim_residence(), 2, '.', ' ')}}</td>
                <td class="column17 style101 n style103" colspan="3">{{number_format($Navancement->Indim_residence() - $avancement->Indim_residence(), 2, '.', ' ')}}</td>
                <td class="column20 style83 null"></td>
                <td class="column21 style104 f style104" colspan="5"></td>
                <td class="column26 style84 null"></td>
                <td class="column27 style84 null"></td>
                <td class="column28 style115 f style115" colspan="3" rowspan="2"></td>
                <td class="column31 style84 null"></td>
                <td class="column32 style84 null"></td>
                <td class="column33 style84 null"></td>
                <td class="column34 style94 null"></td>
              </tr>
              <tr class="row19">
                <td class="column0 style116 s style118" colspan="9">&nbsp;Charge Famille</td>
                <td class="column9 style101 n style100" colspan="4">{{number_format($avancement->charge_famille(), 2, '.', ' ')}}</td>
                <td class="column13 style101 n style100" colspan="4">{{number_format($Navancement->charge_famille(), 2, '.', ' ')}}</td>
                <td class="column17 style101 n style103" colspan="3">{{number_format($Navancement->charge_famille() - $avancement->charge_famille(), 2, '.', ' ')}}</td>
                <td class="column20 style83 null"></td>
                <td class="column21 style104 f style104" colspan="5"></td>
                <td class="column26 style84 null"></td>
                <td class="column27 style84 null"></td>
                <td class="column31 style84 null"></td>
                <td class="column32 style84 null"></td>
                <td class="column33 style84 null"></td>
                <td class="column34 style94 null"></td>
              </tr>
              <tr class="row20">
                <td class="column0 style116 s style118" colspan="9">&nbsp;Indemnité de fonction</td>
                <td class="column9 style101 n style100" colspan="4">{{number_format($avancement->getData()['fonction'], 2, '.', ' ')}}</td>
                <td class="column13 style101 n style100" colspan="4">{{number_format($Navancement->getData()['fonction'], 2, '.', ' ')}}</td>
                <td class="column17 style101 n style103" colspan="3">{{number_format($Navancement->getData()['fonction'] - $avancement->getData()['fonction'], 2, '.', ' ')}}</td>
                <td class="column20 style83 null"></td>
                <td class="column21 style104 f style104" colspan="5"></td>
                <td class="column26 style84 null"></td>
                <td class="column27 style84 null"></td>
                <td class="column28 style84 null"></td>
                <td class="column29 style84 null"></td>
                <td class="column30 style84 null"></td>
                <td class="column31 style84 null"></td>
                <td class="column32 style84 null"></td>
                <td class="column33 style84 null"></td>
                <td class="column34 style94 null"></td>
              </tr>
              <tr class="row21">
                <td class="column0 style116 s style118" colspan="9">Allocation Hierarchique</td>
                <td class="column9 style101 n style100" colspan="4">{{number_format($avancement->getData()['hierarchique'], 2, '.', ' ')}}</td>
                <td class="column13 style101 n style100" colspan="4">{{number_format($Navancement->getData()['hierarchique'], 2, '.', ' ')}}</td>
                <td class="column17 style101 n style103" colspan="3">{{number_format($Navancement->getData()['hierarchique'] - $avancement->getData()['hierarchique'], 2, '.', ' ')}}</td>
                <td class="column20 style119 null"></td>
                <td class="column21 style104 f style104" colspan="5"></td>
                <td class="column26 style120 null"></td>
                <td class="column27 style120 null"></td>
                <td class="column28 style120 null"></td>
                <td class="column29 style120 null"></td>
                <td class="column30 style120 null"></td>
                <td class="column31 style120 null"></td>
                <td class="column32 style120 null"></td>
                <td class="column33 style120 null"></td>
                <td class="column34 style121 null"></td>
              </tr>
              <tr class="row22">
                <td class="column0 style116 s style118" colspan="9">&nbsp;Indemnité de sujection</td>
                <td class="column9 style101 n style100" colspan="4">{{number_format($avancement->getData()['sujection'], 2, '.', ' ')}}</td>
                <td class="column13 style101 n style100" colspan="4">{{number_format($Navancement->getData()['sujection'], 2, '.', ' ')}}</td>
                <td class="column17 style101 n style103" colspan="3">{{number_format($Navancement->getData()['sujection'] - $avancement->getData()['sujection'], 2, '.', ' ')}}</td>
                <td class="column20 style73 s style75" colspan="15">Engagement</td>
              </tr>
              <tr class="row23">
                <td class="column0 style116 s style118" colspan="9">&nbsp;Indemnite d'encadrement</td>
                <td class="column9 style101 n style100" colspan="4">{{number_format($avancement->getData()['encadrement'], 2, '.', ' ')}}</td>
                <td class="column13 style101 n style100" colspan="4">{{number_format($Navancement->getData()['encadrement'], 2, '.', ' ')}}</td>
                <td class="column17 style101 n style103" colspan="3">{{number_format($Navancement->getData()['encadrement'] - $avancement->getData()['encadrement'], 2, '.', ' ')}}</td>
                <td class="column20 style122 s style123" colspan="2">Soit</td>
                <td class="column22 style124 f style124" colspan="4">{{number_format($Navancement->total_montant()/12 - $avancement->total_montant()/12, 2, '.', ' ')}}</td>
                <td class="column26 style125 s">*</td>
                <td class="column27 style126 n style126" colspan="2">12</td>
                <td class="column29 style123 s style123" colspan="2">mois</td>
                <td class="column31 style123 n style123" colspan="2">0</td>
                <td class="column33 style123 s style127" colspan="2">Jours</td>
              </tr>
              <tr class="row24">
                <td class="column0 style116 s style118" colspan="9">&nbsp;Ind.de Téchnicité</td>
                <td class="column9 style101 n style100" colspan="4">{{number_format($avancement->getData()['technicite'], 2, '.', ' ')}}</td>
                <td class="column13 style101 n style100" colspan="4">{{number_format($Navancement->getData()['technicite'], 2, '.', ' ')}}</td>
                <td class="column17 style101 n style103" colspan="3">{{number_format($Navancement->getData()['technicite'] - $avancement->getData()['technicite'], 2, '.', ' ')}}</td>
                <td class="column20 style128 null"></td>
                <td class="column21 style128 null"></td>
                <td class="column22 style128 null"></td>
                <td class="column23 style128 null"></td>
                <td class="column24 style128 null"></td>
                <td class="column25 style128 null"></td>
                <td class="column26 style129 f style129" colspan="5">{{number_format($Navancement->total_montant() - $avancement->total_montant(), 2, '.', ' ')}}</td>
                <td class="column31 style128 null"></td>
                <td class="column32 style128 null"></td>
                <td class="column33 style128 null"></td>
                <td class="column34 style130 null"></td>
              </tr>
              <tr class="row25">
                <td class="column0 style116 s style118" colspan="9">&nbsp;Indemnité special</td>
                <td class="column9 style101 n style100" colspan="4">{{number_format($avancement->getData()['speciale'], 2, '.', ' ')}}</td>
                <td class="column13 style101 n style100" colspan="4">{{number_format($Navancement->getData()['speciale'], 2, '.', ' ')}}</td>
                <td class="column17 style101 n style103" colspan="3">{{number_format($Navancement->getData()['speciale'] - $avancement->getData()['speciale'], 2, '.', ' ')}}</td>
                <td class="column20 style62 s style63" colspan="2">Du</td>
                <td class="column22 style131 null style131" colspan="6">01/01/{{date('Y')}}</td>
                <td class="column28 style63 s style63" colspan="2">Au</td>
                <td class="column30 style131 f style132" colspan="5">31/12/{{date('Y')}}</td>
              </tr>
              <tr class="row26">
                <td class="column0 style116 s style118" colspan="9">Indemnité administrative speciale</td>
                <td class="column9 style101 n style100" colspan="4">{{number_format($avancement->getData()['administrative'], 2, '.', ' ')}}</td>
                <td class="column13 style101 n style100" colspan="4">{{number_format($Navancement->getData()['administrative'], 2, '.', ' ')}}</td>
                <td class="column17 style101 n style103" colspan="3">{{number_format($Navancement->getData()['administrative'] - $avancement->getData()['administrative'], 2, '.', ' ')}}</td>
                <td class="column20 style133 s style135" colspan="15">Rappel</td>
              </tr>
              <tr class="row27">
                <td class="column0 style116 null style118" colspan="9"></td>
                <td class="column9 style101 null style103" colspan="4"></td>
                <td class="column13 style101 null style103" colspan="4"></td>
                <td class="column17 style101 null style103" colspan="3"></td>
                <td class="column20 style122 s style123" colspan="2">Soit</td>
                <td class="column22 style124 f style124" colspan="4">{{number_format(($Navancement->total_montant()/12-$Navancement->total_decompte()/12) - ($avancement->total_montant()/12-$avancement->total_decompte()/12), 2, '.', ' ')}}</td>
                <td class="column26 style125 s">*</td>
                <td class="column27 style126 n style126" colspan="2">12</td>
                <td class="column29 style123 s style123" colspan="2">mois</td>
                <td class="column31 style123 n style123" colspan="2">0</td>
                <td class="column33 style123 s style127" colspan="2">Jours</td>
              </tr>
              <tr class="row28">
                <td class="column0 style116 null style118" colspan="9"></td>
                <td class="column9 style101 null style103" colspan="4"></td>
                <td class="column13 style101 null style103" colspan="4"></td>
                <td class="column17 style101 null style103" colspan="3"></td>
                <td class="column20 style128 null"></td>
                <td class="column21 style128 null"></td>
                <td class="column22 style128 null"></td>
                <td class="column23 style128 null"></td>
                <td class="column24 style128 null"></td>
                <td class="column25 style128 null"></td>
                <td class="column26 style129 f style129" colspan="5">{{number_format(($Navancement->total_montant()-$Navancement->total_decompte()) - ($avancement->total_montant()-$avancement->total_decompte()), 2, '.', ' ')}}</td>
                <td class="column31 style128 null"></td>
                <td class="column32 style128 null"></td>
                <td class="column33 style128 null"></td>
                <td class="column34 style130 null"></td>
              </tr>
              <tr class="row29">
                <td class="column0 style116 null style118" colspan="9"></td>
                <td class="column9 style136 null style138" colspan="4"></td>
                <td class="column13 style136 null style138" colspan="4"></td>
                <td class="column17 style136 null style138" colspan="3"></td>
                <td class="column20 style62 s style63" colspan="2">Du</td>
                <td class="column22 style131 f style63" colspan="6">01/01/{{date('Y')}}</td>
                <td class="column28 style63 s style63" colspan="2">Au</td>
                <td class="column30 style131 f style132" colspan="5">31/12/{{date('Y')}}</td>
              </tr>
              <tr class="row30">
                <td class="column0 style139 s style141" colspan="9">Emoluments annuels</td>
                <td class="column9 style98 n style141" colspan="4">{{number_format($avancement->total_montant(), 2, '.', ' ')}}</td>
                <td class="column13 style98 n style141" colspan="4">{{number_format($Navancement->total_montant(), 2, '.', ' ')}}</td>
                <td class="column17 style101 n style141" colspan="3">{{number_format($Navancement->total_montant() - $avancement->total_montant(), 2, '.', ' ')}}</td>
                <td class="column20 style139 s style141" colspan="15">Président  du Conseil Communal de Tan Tan</td>
              </tr>
              <tr class="row31">
                <td class="column0 style122 null style127" colspan="9"></td>
                <td class="column9 style146 s style148" colspan="11">Décompte Mensuel</td>
                <td class="column20 style128 null"></td>
                <td class="column21 style128 null"></td>
                <td class="column22 style128 null"></td>
                <td class="column23 style128 null"></td>
                <td class="column24 style128 null"></td>
                <td class="column25 style128 null"></td>
                <td class="column26 style128 null"></td>
                <td class="column27 style149 null"></td>
                <td class="column28 style149 null"></td>
                <td class="column29 style123 null style123" colspan="3"></td>
                <td class="column32 style124 null style150" colspan="3"></td>
              </tr>
              <tr class="row32">
                <td class="column0 style12 null style151" colspan="9"></td>
                <td class="column9 style98 n style141" colspan="4">{{number_format($avancement->total_montant()/12, 2, '.', ' ')}}</td>
                <td class="column13 style98 n style141" colspan="4">{{number_format($Navancement->total_montant()/12, 2, '.', ' ')}}</td>
                <td class="column17 style101 n style141" colspan="3">{{number_format($Navancement->total_montant()/12 - $avancement->total_montant()/12, 2, '.', ' ')}}</td>
                <td class="column20 style128 null"></td>
                <td class="column21 style152 null style153" colspan="4"></td>
                <td class="column25 style128 null"></td>
                <td class="column26 style128 null"></td>
                <td class="column27 style128 null"></td>
                <td class="column28 style128 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style152 null style154" colspan="3"></td>
              </tr>
              <tr class="row33">
                <td class="column0 style155 s style157" colspan="9">A déduire…………………</td>
                <td class="column9 style158 null style159" colspan="4"></td>
                <td class="column13 style158 null style160" colspan="4"></td>
                <td class="column17 style159 null style160" colspan="3"></td>
                <td class="column20 style128 null"></td>
                <td class="column21 style128 null"></td>
                <td class="column22 style128 null"></td>
                <td class="column23 style152 null style152" colspan="3"></td>
                <td class="column26 style128 null"></td>
                <td class="column27 style128 null"></td>
                <td class="column28 style128 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style152 null style154" colspan="3"></td>
              </tr>
              <tr class="row34">
                <td class="column0 style161 null style163" colspan="9"></td>
                <td class="column9 style164 null style164" colspan="4"></td>
                <td class="column13 style165 null style167" colspan="4"></td>
                <td class="column17 style164 null style164" colspan="3"></td>
                <td class="column20 style128 null"></td>
                <td class="column21 style128 null"></td>
                <td class="column22 style128 null"></td>
                <td class="column23 style128 null"></td>
                <td class="column24 style128 null"></td>
                <td class="column25 style128 null"></td>
                <td class="column26 style128 null"></td>
                <td class="column27 style128 null"></td>
                <td class="column28 style128 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style152 null style154" colspan="3"></td>
              </tr>
              <tr class="row35">
                <td class="column0 style161 s style163" colspan="9">IR</td>
                <td class="column9 style101 n style100" colspan="4">{{number_format($avancement->getData()['IGR']/12, 2, '.', ' ')}}</td>
                <td class="column13 style101 n style100" colspan="4">{{number_format($Navancement->getData()['IGR']/12, 2, '.', ' ')}}</td>
                <td class="column17 style101 n style103" colspan="3">{{number_format($Navancement->getData()['IGR']/12 - $avancement->getData()['IGR']/12, 2, '.', ' ')}}</td>
                <td class="column20 style128 null"></td>
                <td class="column21 style128 null"></td>
                <td class="column22 style128 null"></td>
                <td class="column23 style128 null"></td>
                <td class="column24 style152 null style152" colspan="2"></td>
                <td class="column26 style128 null"></td>
                <td class="column27 style128 null"></td>
                <td class="column28 style128 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style152 null style154" colspan="3"></td>
              </tr>
              <tr class="row36">
                <td class="column0 style116 s style118" colspan="9">C.M.R</td>
                <td class="column9 style101 n style100" colspan="4">{{number_format($avancement->getData()['CMR']/12, 2, '.', ' ')}}</td>
                <td class="column13 style101 n style100" colspan="4">{{number_format($Navancement->getData()['CMR']/12, 2, '.', ' ')}}</td>
                <td class="column17 style101 n style103" colspan="3">{{number_format($Navancement->getData()['CMR']/12 - $avancement->getData()['CMR']/12, 2, '.', ' ')}}</td>
                <td class="column20 style128 null"></td>
                <td class="column21 style171 f style171" colspan="5"></td>
                <td class="column26 style128 null"></td>
                <td class="column27 style128 null"></td>
                <td class="column28 style128 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style152 null style154" colspan="3"></td>
              </tr>
              <tr class="row37">
                <td class="column0 style116 s style118" colspan="9">SM (OMFAM)</td>
                <td class="column9 style101 n style100" colspan="4">{{number_format($avancement->getData()['OMFAM']/12, 2, '.', ' ')}}</td>
                <td class="column13 style101 n style100" colspan="4">{{number_format($Navancement->getData()['OMFAM']/12, 2, '.', ' ')}}</td>
                <td class="column17 style101 n style103" colspan="3">{{number_format($Navancement->getData()['OMFAM']/12 - $avancement->getData()['OMFAM']/12, 2, '.', ' ')}}</td>
                <td class="column20 style128 null"></td>
                <td class="column21 style128 null"></td>
                <td class="column22 style128 null"></td>
                <td class="column23 style128 null"></td>
                <td class="column24 style128 null"></td>
                <td class="column25 style128 null"></td>
                <td class="column26 style128 null"></td>
                <td class="column27 style128 null"></td>
                <td class="column28 style128 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style13 null style151" colspan="3"></td>
              </tr>
              <tr class="row38">
                <td class="column0 style116 s style118" colspan="9">CAAD</td>
                <td class="column9 style101 n style100" colspan="4">{{number_format($avancement->getData()['CAAD']/12, 2, '.', ' ')}}</td>
                <td class="column13 style101 n style100" colspan="4">{{number_format($Navancement->getData()['CAAD']/12, 2, '.', ' ')}}</td>
                <td class="column17 style101 n style103" colspan="3">{{number_format($Navancement->getData()['CAAD']/12 - $avancement->getData()['CAAD']/12, 2, '.', ' ')}}</td>
                <td class="column20 style128 null"></td>
                <td class="column21 style128 null"></td>
                <td class="column22 style172 null style172" colspan="3"></td>
                <td class="column25 style128 null"></td>
                <td class="column26 style128 null"></td>
                <td class="column27 style128 null"></td>
                <td class="column28 style128 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style152 null style154" colspan="3"></td>
              </tr>
              <tr class="row39">
                <td class="column0 style116 s style118" colspan="9">SM (MGPAP)</td>
                <td class="column9 style101 n style100" colspan="4">{{number_format($avancement->getData()['MGPAP']/12, 2, '.', ' ')}}</td>
                <td class="column13 style101 n style100" colspan="4">{{number_format($Navancement->getData()['MGPAP']/12, 2, '.', ' ')}}</td>
                <td class="column17 style101 n style103" colspan="3">{{number_format($Navancement->getData()['MGPAP']/12 - $avancement->getData()['MGPAP']/12, 2, '.', ' ')}}</td>
                <td class="column20 style128 null"></td>
                <td class="column21 style128 null"></td>
                <td class="column22 style173 null"></td>
                <td class="column23 style173 null"></td>
                <td class="column24 style173 null"></td>
                <td class="column25 style128 null"></td>
                <td class="column26 style128 null"></td>
                <td class="column27 style128 null"></td>
                <td class="column28 style128 s">,</td>
                <td class="column29 style174 null"></td>
                <td class="column30 style174 null"></td>
                <td class="column31 style174 null"></td>
                <td class="column32 style175 null"></td>
                <td class="column33 style175 null"></td>
                <td class="column34 style176 null"></td>
              </tr>
              <tr class="row40">
                <td class="column0 style177 null"></td>
                <td class="column1 style178 null"></td>
                <td class="column2 style178 null"></td>
                <td class="column3 style117 s style117" colspan="3">CCD</td>
                <td class="column6 style178 null"></td>
                <td class="column7 style178 null"></td>
                <td class="column8 style179 null"></td>
                <td class="column9 style101 n style100" colspan="4">{{number_format($avancement->getData()['CCD']/12, 2, '.', ' ')}}</td>
                <td class="column13 style101 n style100" colspan="4">{{number_format($Navancement->getData()['CCD']/12, 2, '.', ' ')}}</td>
                <td class="column17 style101 n style103" colspan="3">{{number_format($Navancement->getData()['CCD']/12 - $avancement->getData()['CCD']/12, 2, '.', ' ')}}</td>
                <td class="column20 style128 null"></td>
                <td class="column21 style128 null"></td>
                <td class="column22 style173 null"></td>
                <td class="column23 style173 null"></td>
                <td class="column24 style173 null"></td>
                <td class="column25 style128 null"></td>
                <td class="column26 style128 null"></td>
                <td class="column27 style128 null"></td>
                <td class="column28 style128 null"></td>
                <td class="column29 style174 null"></td>
                <td class="column30 style174 null"></td>
                <td class="column31 style174 null"></td>
                <td class="column32 style175 null"></td>
                <td class="column33 style175 null"></td>
                <td class="column34 style176 null"></td>
              </tr>
              <tr class="row41">
                <td class="column0 style116 s style118" colspan="9">AMO</td>
                <td class="column9 style101 n style100" colspan="4">{{number_format($avancement->getData()['AMO']/12, 2, '.', ' ')}}</td>
                <td class="column13 style101 n style100" colspan="4">{{number_format($Navancement->getData()['AMO']/12, 2, '.', ' ')}}</td>
                <td class="column17 style101 n style103" colspan="3">{{number_format($Navancement->getData()['AMO']/12 - $avancement->getData()['AMO']/12, 2, '.', ' ')}}</td>
                <td class="column20 style128 null"></td>
                <td class="column21 style171 f style171" colspan="5"></td>
                <td class="column26 style128 null"></td>
                <td class="column27 style128 null"></td>
                <td class="column28 style128 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style13 null style151" colspan="3"></td>
              </tr>
              <tr class="row42">
                <td class="column0 style116 s style118" colspan="9">AOS</td>
                <td class="column9 style101 n style100" colspan="4">{{number_format($avancement->getData()['AOS']/12, 2, '.', ' ')}}</td>
                <td class="column13 style101 n style100" colspan="4">{{number_format($Navancement->getData()['AOS']/12, 2, '.', ' ')}}</td>
                <td class="column17 style101 n style103" colspan="3">{{number_format($Navancement->getData()['AOS']/12 - $avancement->getData()['AOS']/12, 2, '.', ' ')}}</td>
                <td class="column20 style128 null"></td>
                <td class="column21 style128 null"></td>
                <td class="column22 style128 null"></td>
                <td class="column23 style128 null"></td>
                <td class="column24 style128 null"></td>
                <td class="column25 style128 null"></td>
                <td class="column26 style128 null"></td>
                <td class="column27 style128 null"></td>
                <td class="column28 style128 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style152 null style154" colspan="3"></td>
              </tr>
              <tr class="row43">
                <td class="column0 style116 s style118" colspan="9">FHSO</td>
                <td class="column9 style101 n style103" colspan="4">0 000.00</td>
                <td class="column13 style101 n style103" colspan="4">0 000.00</td>
                <td class="column17 style168 n style170" colspan="3">0.00</td>
                <td class="column20 style128 null"></td>
                <td class="column21 style128 null"></td>
                <td class="column22 style128 s" colspan="3">Tan Tan le :</td>
                <td class="column25 style128 null"></td>
                <td class="column26 style128 null"></td>
                <td class="column27 style128 null"></td>
                <td class="column28 style128 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style13 null style151" colspan="3"></td>
              </tr>
              <tr class="row44">
                <td class="column0 style116 s style118" colspan="9">Opp.Juridique</td>
                <td class="column9 style101 n style103" colspan="4">0 000.00</td>
                <td class="column13 style101 n style103" colspan="4">0 000.00</td>
                <td class="column17 style168 n style170" colspan="3">0.00</td>
                <td class="column20 style128 null"></td>
                <td class="column21 style128 null"></td>
                <td class="column22 style128 null"></td>
                <td class="column23 style128 null"></td>
                <td class="column24 style128 null"></td>
                <td class="column25 style128 null"></td>
                <td class="column26 style128 null"></td>
                <td class="column27 style128 null"></td>
                <td class="column28 style128 null"></td>
                <td class="column29 style37 null style37" colspan="3"></td>
                <td class="column32 style37 null style35" colspan="3"></td>
              </tr>
              <tr class="row45">
                <td class="column0 style116 s style118" colspan="9">LOYER</td>
                <td class="column9 style101 n style103" colspan="4">0 000.00</td>
                <td class="column13 style101 n style103" colspan="4">0 000.00</td>
                <td class="column17 style168 n style170" colspan="3">0.00</td>
                <td class="column20 style183 s style185" colspan="7">Mondatement</td>
                <td class="column27 style186 s style187" colspan="8">Trésorerie Provincial</td>
              </tr>
              <tr class="row46">
                <td class="column0 style116 s style118" colspan="9">EQDOM</td>
                <td class="column9 style101 n style103" colspan="4">0 000.00</td>
                <td class="column13 style101 n style103" colspan="4">0 000.00</td>
                <td class="column17 style168 n style170" colspan="3">0.00</td>
                <td class="column20 style188 s style190" colspan="3">Brut</td>
                <td class="column23 style191 f style193" colspan="4">{{number_format(($Navancement->total_montant()/12 - $avancement->total_montant()/12)*$month, 2, '.', ' ')}}</td>
                <td class="column27 style194 null"></td>
                <td class="column28 style195 null"></td>
                <td class="column29 style48 null style48" colspan="3"></td>
                <td class="column32 style196 null style197" colspan="3"></td>
              </tr>
              <tr class="row47">
                <td class="column0 style116 s style118" colspan="9">WAFASALAF</td>
                <td class="column9 style101 n style103" colspan="4">0 000.00</td>
                <td class="column13 style101 n style103" colspan="4">0 000.00</td>
                <td class="column17 style168 n style170" colspan="3">0.00</td>
                <td class="column20 style188 s style190" colspan="3">IGR</td>
                <td class="column23 style191 f style193" colspan="4">{{number_format(($Navancement->getData()['IGR']/12 - $avancement->getData()['IGR']/12)*$month, 2, '.', ' ')}}</td>
                <td class="column27 style128 null"></td>
                <td class="column28 style198 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style152 null style154" colspan="3"></td>
              </tr>
              <tr class="row48">
                <td class="column0 style116 s style118" colspan="9">ASSALAF CHAABI</td>
                <td class="column9 style101 n style103" colspan="4">0 000.00</td>
                <td class="column13 style101 n style103" colspan="4">0 000.00</td>
                <td class="column17 style168 n style170" colspan="3">0.00</td>
                <td class="column20 style188 s style190" colspan="3">CMR</td>
                <td class="column23 style191 f style193" colspan="4">{{number_format(($Navancement->getData()['CMR']/12 - $avancement->getData()['CMR']/12)*$month, 2, '.', ' ')}}</td>
                <td class="column27 style128 null"></td>
                <td class="column28 style198 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style13 null style151" colspan="3"></td>
              </tr>
              <tr class="row49">
                <td class="column0 style116 s style118" colspan="9">SOREC</td>
                <td class="column9 style101 n style103" colspan="4">0 000.00</td>
                <td class="column13 style101 n style103" colspan="4">0 000.00</td>
                <td class="column17 style168 n style170" colspan="3">0.00</td>
                <td class="column20 style199 s style200" colspan="3">SM</td>
                <td class="column23 style201 f style203" colspan="4">{{number_format(($Navancement->getData()['OMFAM']/12 - $avancement->getData()['OMFAM']/12)*$month, 2, '.', ' ')}}</td>
                <td class="column27 style128 null"></td>
                <td class="column28 style198 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style13 null style151" colspan="3"></td>
              </tr>
              <tr class="row50">
                <td class="column0 style116 s style118" colspan="9">Rachat</td>
                <td class="column9 style101 null style103" colspan="4"></td>
                <td class="column13 style101 null style103" colspan="4"></td>
                <td class="column17 style168 null style170" colspan="3"></td>
                <td class="column20 style199 s style200" colspan="3">CAAD</td>
                <td class="column23 style201 f style203" colspan="4">{{number_format(($Navancement->getData()['CAAD']/12 - $avancement->getData()['CAAD']/12)*$month, 2, '.', ' ')}}</td>
                <td class="column27 style128 null"></td>
                <td class="column28 style198 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style152 null style154" colspan="3"></td>
              </tr>
              <tr class="row51">
                <td class="column0 style116 s style118" colspan="9">BCP.CR.CONS</td>
                <td class="column9 style101 null style103" colspan="4"></td>
                <td class="column13 style101 null style103" colspan="4"></td>
                <td class="column17 style101 null style103" colspan="3"></td>
                <td class="column20 style199 s style200" colspan="3">SM</td>
                <td class="column23 style201 f style203" colspan="4">{{number_format(($Navancement->getData()['MGPAP']/12 - $avancement->getData()['MGPAP']/12)*$month, 2, '.', ' ')}}</td>
                <td class="column27 style128 null"></td>
                <td class="column28 style198 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style13 null style151" colspan="3"></td>
              </tr>
              <tr class="row52">
                <td class="column0 style116 null style118" colspan="9"></td>
                <td class="column9 style101 null style103" colspan="4"></td>
                <td class="column13 style101 null style103" colspan="4"></td>
                <td class="column17 style101 null style103" colspan="3"></td>
                <td class="column20 style199 s style200" colspan="3">CCD</td>
                <td class="column23 style201 f style203" colspan="4">{{number_format(($Navancement->getData()['CCD']/12 - $avancement->getData()['CCD']/12)*$month, 2, '.', ' ')}}</td>
                <td class="column27 style128 null"></td>
                <td class="column28 style198 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style13 null style151" colspan="3"></td>
              </tr>
              <tr class="row53">
                <td class="column0 style116 null style118" colspan="9"></td>
                <td class="column9 style101 null style103" colspan="4"></td>
                <td class="column13 style101 null style103" colspan="4"></td>
                <td class="column17 style101 null style103" colspan="3"></td>
                <td class="column20 style199 s style200" colspan="3">AMO</td>
                <td class="column23 style201 f style203" colspan="4">{{number_format(($Navancement->getData()['AMO']/12 - $avancement->getData()['AMO']/12)*$month, 2, '.', ' ')}}</td>
                <td class="column27 style128 null"></td>
                <td class="column28 style198 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style172 null style151" colspan="3"></td>
              </tr>
              <tr class="row54">
                <td class="column0 style116 null style118" colspan="9"></td>
                <td class="column9 style101 null style103" colspan="4"></td>
                <td class="column13 style101 null style103" colspan="4"></td>
                <td class="column17 style101 null style103" colspan="3"></td>
                <td class="column20 style199 s style200" colspan="3">AOS</td>
                <td class="column23 style201 f style203" colspan="4">{{number_format(($Navancement->getData()['AOS']/12 - $avancement->getData()['AOS']/12)*$month, 2, '.', ' ')}}</td>
                <td class="column27 style128 null"></td>
                <td class="column28 style198 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style13 null style151" colspan="3"></td>
              </tr>
              <tr class="row55">
                <td class="column0 style205 null style207" colspan="9"></td>
                <td class="column9 style208 null style210" colspan="4"></td>
                <td class="column13 style208 null style210" colspan="4"></td>
                <td class="column17 style136 null style138" colspan="3"></td>
                <td class="column20 style199 s style200" colspan="3">V.S</td>
                <td class="column23 style211 f style213" colspan="4">0.00</td>
                <td class="column27 style198 null"></td>
                <td class="column28 style198 null"></td>
                <td class="column29 style13 null style13" colspan="3"></td>
                <td class="column32 style13 null style151" colspan="3"></td>
              </tr>
              <tr class="row56">
                <td class="column0 style214 s style214" colspan="9">Net à Ordonnancer</td>
                <td class="column9 style98 n style141" colspan="4">{{number_format($avancement->total_montant()/12-$avancement->total_decompte()/12, 2, '.', ' ')}}</td>
                <td class="column13 style98 n style141" colspan="4">{{number_format($Navancement->total_montant()/12-$Navancement->total_decompte()/12, 2, '.', ' ')}}</td>
                <td class="column17 style101 n style141" colspan="3">{{number_format(($Navancement->total_montant()/12-$Navancement->total_decompte()/12) - ($avancement->total_montant()/12-$avancement->total_decompte()/12), 2, '.', ' ')}}</td>
                <td class="column20 style216 s style216" colspan="3">Net</td>
                <td class="column23 style217 f style217" colspan="4">{{number_format((($Navancement->total_montant()/12-$Navancement->total_decompte()/12) - ($avancement->total_montant()/12-$avancement->total_decompte()/12))*$month, 2, '.', ' ') }}</td>
                <td class="column27 style218 null"></td>
                <td class="column28 style218 null"></td>
                <td class="column29 style63 null style63" colspan="3"></td>
                <td class="column32 style219 null style220" colspan="3"></td>
              </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('script')
window.print();

window.addEventListener('afterprint', function() {
    history.back();
});
@endsection
