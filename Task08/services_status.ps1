Get-Service |
    Select-Object Name, Status |
    ForEach-Object {
        $color = switch ($_.Status) {
            'Running' { 'Green' }
            'Stopped' { 'Red' }
            default   { 'Yellow' }  # Например, для статусов вроде "Paused"
        }
        Write-Host ("{0,-30} {1}" -f $_.Name, $_.Status) -ForegroundColor $color
    }
