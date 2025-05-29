$desktop = [Environment]::GetFolderPath('Desktop')
$shell = New-Object -ComObject WScript.Shell
$badDir = Join-Path $desktop 'BadLinks'
if (-not (Test-Path $badDir)) { New-Item -ItemType Directory -Path $badDir | Out-Null }

Get-ChildItem -Path $desktop -Filter '*.lnk' | ForEach-Object {
    $shortcut = $shell.CreateShortcut($_.FullName)
    $target = $shortcut.TargetPath

    if ([string]::IsNullOrWhiteSpace($target) -or -not (Test-Path $target)) {
        Move-Item -Path $_.FullName -Destination $badDir
    }
}
