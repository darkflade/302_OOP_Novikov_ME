function Show-Date_Info {
    $today = Get-Date
    $day = $today.Day
    $month = $today.Month
    $year = $today.Year

    Write-Host "Сегодня: $($today.ToString('dd.MM.yyyy'))"

    $dayFact = Invoke-RestMethod -Uri "http://numbersapi.com/$day/math?json"
    Write-Host $dayFact.text

    $monthFact = Invoke-RestMethod -Uri "http://numbersapi.com/$month/math?json"
    Write-Host $monthFact.text

    $yearFact = Invoke-RestMethod -Uri "http://numbersapi.com/$year/math?json"
    Write-Host $yearFact.text
}

Show-Date_Info
