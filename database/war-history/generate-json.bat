for /f %%f in ('dir /b raw') do cw_parser.py raw\%%f -o json\
