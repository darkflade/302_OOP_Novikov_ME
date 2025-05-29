$user = $env:USERNAME
$comp = $env:COMPUTERNAME

$excel = New-Object -ComObject Excel.Application
$excel.Visible = $false
$workbook = $excel.Workbooks.Add()
$sheet = $workbook.Worksheets.Item(1)

$cell = $sheet.Range('B2')
$cell.Value2 = 'Привет от PowerShell'
$cell.Font.Size = 12
$cell.Font.Italic = $true

$filename = "${user}_${comp}.xlsx"
$path = Join-Path -Path (Get-Location) -ChildPath $filename
$workbook.SaveAs($path)

$excel.Quit()
[System.Runtime.Interopservices.Marshal]::ReleaseComObject($excel) | Out-Null