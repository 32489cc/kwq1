<?php
function get_univ_info_xmlss_header_print($active_sheet=0)
{
    //取得日期
    //$app_date=new \Carbon\Carbon();
    $online_date=\Carbon\Carbon::now()->format('Y/m/d H:i:s');
    $last_saved_date=date('Y-m-d',strtotime($online_date));
    $last_saved_time=date('H:i:s',strtotime($online_date));

    $str=<<<EOD
<?xml version="1.0"?>
<?mso-application progid="Excel.Sheet"?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
xmlns:o="urn: schemas-microsoft-com:office:office"
xmlns:x="urn: schemas-microsoft-com:office:excel"
xmlns:ss="urn: schemas-microsoft-com:office:spreadsheet"
xmlns:html="http://www.w3.org/TR/REC-htm140">
<DocumentProperties xmlns="urn: schemas-microsoft-com:office:office">
<Title>Untitled Spreadsheet</Title>
<Author>情報スクエア</Author>
<LastAuthor>情報スクエア</LastAuthor>
<Created>2023-12-01T00:00:00Z</Created>
<LastSaved>{$last_saved_date}T{$last_saved_time}Z</LastSaved>
<Company>河合塾</Company>
<Version>14.00</Version>
</DocumentProperties>
<OfficeDocumentSettings xmIns="urn: schemas-microsoft-com:office:office">
<AllowPNG/>
</OfficeDocumentSettings>
<Excelworkbook xmlns="urn:schemas-microsoft-com:office:excel">
<WindowHeight>6570</WindowHeight>
<Windowwidth>18795</Windowwidth>
<WindowTopX>900</WindowTopX>
<WindowTopY>1080</WindowTopY>
<ProtectStructure>False</ProtectStructure>
<Protectwindows>False</Protectwindows>
<Activesheet>{$active_sheet}</Activesheet>
</Excelworkbook>


EOD;

    return $str;
}
function get_univ_info_xmlss_style_print($type='')
{
    $str="";
    if($type=='recommend'){
        $str=_get_univ_info_xmlss_style_recommend();
    }
    return $str;
}
function _get_univ_info_xmlss_style_recommend()
{
    $str =<<<EOD
<Styles>
　<Style ss:ID="Default" ss:Name="Normal">
    <Alignment ss:Vertical="Bottom" />
    <Borders/>
    <Font ss:FontName="MSゴシッグ" x:Charset="128" x:Family="Nodern" ss:Color="000000"/>
<Interior/>
<NumberFormat/>
<Protection/>
</Style>
<Style ss:ID="s62" ss:Name="標準 2">
<Alignment ss:Vertical="Center" />
<Borders/>
<Font ss:FontName="MSゴシッグ" x:Charset="128" x:Family="Nodern" ss:Color="000000"/>
<Interior/>
<NumberFormat/>
<Protection/>
</Style>
<Style ss:ID="s63" ss:Name="標準 3">
<Alignment ss:Vertical="Bottom"/>
<Borders/>
<Font ss:FontName="MSゴシッグ" x:Charset="128" x:Family="Nodern" ss:Size="11" ss:Color="000000"/>
<Interior/>
<NumberFormat/>
<Protection/>
</Style>
<Style ss:ID="m667283664">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m667283664">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m667283684">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m298246156" ss:Parent="s62">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m298246176" ss:Parent="s62">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m298246196" ss:Parent="s62">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m298246216" ss:Parent="s62">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m611657508" ss:Parent="s62">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m611657548" ss:Parent="s62">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m611657568" ss:Parent="s62">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m611657588" ss:Parent="s62">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m611657608" ss:Parent="s62">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m852747984">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m852748004">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m852748024">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m852748044">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m852748064">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m852748084">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m852748104">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m852746984">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m852747004" ss:Parent="s62">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" />
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m852747024" ss:Parent="s62">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
<Style ss:ID="m852747044" ss:Parent="s62">
<Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
<Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
</Borders>
<Font ss:FontName="MS ゴシッグ" x:Charset="128" x:Family="Modern" ss:Size="11" ss:Color="000000"/>
<Interior ss:Color="#FFCC99" ss:Pattern="Solid" />
</Style>
</Styles>
</Workbook>
EOD;

    return $str;
}
function _get_univ_info_xmlss_content_header_recommend($output_type,$univ_name)
{
    if($output_type=='make') {
        $str = <<<EOD

EOD;
    }elseif ($output_type=='print'){
        $online_date=\Carbon\Carbon::now()->format('Y-m-d H:i:s');

        $output_type=date('Y-m-d',strtotime($online_date));
        $str=<<<EOD
<Worksheet ss:Name="推薦型•給合型選拔該当大学一覧">
<Names>
<NamedRange ss:Name="Print_Titles" ss:RefersTo="=推薦型•給合型選拔該当大学一覧!R3:R6"/>
</Names>
<Table ss:ExpandedColumnCount="65" x:FullColumns="1" x:FullRows="1" ss:StyleID="s71" ss:DefaultColumnwidth="54">
<Column ss:StyleID="s72" ss:AutoFitWidth="0" ss:Width="33.75"/>
<Column ss:StyleID="s72" ss:AutoFitwidth="0" ss:Width="68.25" ss:Span="1"/>
<Column ss:Index="4" ss:StyleID="s72" ss:AutoFitWidth="0" ss:Width="171.75"/>
<Column ss:StyleID="s72" ss:AutoFitwidth="0" ss:Width="95.25" />
<Column ss:StyleID="s73" ss:Width="58.5" />
<Column ss:StyleID="s73" ss:AutoFitWidth="0" ss:Width="37.5"/>
<Column ss:StyleID="s73" ss:Width="43.5"/>
<Column ss:StyleID="s74" ss:AutoFitWidth="0" ss:Width="31.5"/>
<Column ss:StyleID="s73" ss:AutoFitWidth="0" ss:Width="34.5"/>
<Column ss:StyleID="s73" ss:AutoFitWidth="0" ss:Width="56.25"/>
<Column ss:StyleID="s73" ss:AutoFitWidth="0" ss:Width="34.5"/>
<Column ss:StyleID="s73" ss:AutoFitWidth="0" ss:Width="56.25"/>
<Column ss:StyleID="s73" ss:AutoFitWidth="0" ss:Width="56.25" />
<Column sS:StyleID="s73" ss:AutoFitwidth="e" ss:Width="67.5"/>
<Column ss:StyleID="s75" ss:AutoFitWidth="0" ss :Width="56.25" ss:Span="3" />
<Column ss:Index="20" ss:StyleID="s75" ss:AutoFitWidth="0" ss:Width="101.25" ss:Span="1"/>
<Column ss:Index="22" ss:StyleID="s75" ss:AutoFitWidth="0" ss:Width="56.25" ss:Span="1"/>
<Column ss:Index="24" ss:StyleID="s75" ss:AutoFitWidth="0" ss:Width="101.25" ss:Span="1"/>
<Column ss:Index="26" sS:StyleID="s73" s5:AutoFitwidth="9" ss:width="37.5"/>
<Column ss:StyleID="s72" ss:Width="45"/>
<Column ss:StyleID="s72" ss:AutoFitwidth="0" ss:Width="112.5"/>
<Column ss:StyleID="s72" ss:AutoFitWidth="0" ss:Width="96.75" />
<Column ss:StyleID="s73" ss:AutoFitWidth="0" ss :Width="37.5"/>
<Column ss:StyleID="s72" ss:Width="45"/>
<Column ss:StyleID="s72" ss:AutoFitwidth="0" ss:Width="112.5"/>
<Column ss:StyleID="s72" ss:AutoFitwidth="0" ss:Width="96.75"/>
<Column ss:StyleID="s73" ss:AutoFitWidth="0" ss:Width="37.5"/>
<Column ss:StyleID="s72" ss:Width="45"/>
<Column ss:StyleID="s72" ss:AutoFitwidth="0" ss:Width="112.5"/>
<Column ss:StyleID="s72" ss:AutoFitwidth="0" ss:Width="96.75"/>
<Column ss:StyleID="s72" ss:AutoFitwidth="0" ss:Width="56.25" ss:Span="1"/>
<Column ss:Index="40" ss:StyleID="s72" ss:AutoFitWidth="0" ss:Width="45.75" ss:Span="2"/>
<Column ss:Index="43" ss:StyleID="s72" ss:AutoFitwidth="g" ss:Width= "56.25"/>
<Column ss:StyleID="s72" ss:AutoFitWidth="0" ss:Width="45.75" 55:Span="2" />
<Column ss:Index="47" ss:StyleID="s72" ss:AutoFitwidth="0" ss:Width="56.25" />
<Column ss:StyleID="s72" ss:AutoFitWidth="0" ss:Width="45.75" ss:Span="2"/>
<Column ss:Index="51" ss:styleID="s72" ss:AutoFitwidth="o" ss:width="56.25" ss:Span="1"/>
<Column ss:Index="53" ss:StyleID="s72" ss:AutoFitWidth="0" ss:Width="45.75" ss:Span="2" />
<Column ss:Index="56" ss:StyleID="s72" ss:AutoFitwidth="g" ss:width="56.25"/>
<Column ss:StyleID="s72" ss:AutoFitWidth="0" ss:Width="45.75" ss:Span="2"/>
<Column ss:Index="60" ss:StyleID="572" ss:AutoFitWidth="0" ss:Width="56.25" />
<Column ss:StyleID="s72" ss:AutoFitWidth="0" ss:Width="45.75" ss:Span="2"/>
<Column ss:Index="64" ss:StyleID="s72" ss:AutoFitWidth="0" ss:Width="96.75" ss:Span="1" />
<Row ss:AutoFitHeight="0" ss:Height="26.25">
<Cell ss:StyleID="s76"><Data ss:Type= "String">{$univ_name} {$output_type}</Data></Cell>
</Row>
<Row ss:AutoFitHeight="0" ss:Height="12">
<cell ss:styleID="s77"/>
<Cell ss:Index="49" ss:StyleID="s78" />
<Cell ss:Index="62" ss:StyleID="s78" />
<Cell ss:Index="65" ss:StyleID="s78" /><Data ss:Type="String">出力日：{$online_date}</Data></Cell>
</Row>
<Row ss:AutoFitHeight="0" ss:Height="21.75">
<Cel1l ss:MergeDown="3"><Data ss:Type="String">入試年度</Data></Cell>
<Cell ss:MergeDown="3" ><Data ss:Type="String">†¥</Data></Cel1>
<Cell ss:MergeDown="3" ><Data ss:Type="String">学部／学科／専攻・コース</Data></Cell>
<Cell ss:MergeDown="3"><Data ss:Type="String">学部／学科／専攻・コース</Data></Cell>
<Cell ss:MergeDown="3"><Data ss:Type="String">選抜名</Data></Cel1>
</Row>
</Table>
</Worksheet>

EOD;


    }
    return $str;
}
