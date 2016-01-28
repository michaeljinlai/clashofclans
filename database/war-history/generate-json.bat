for /f %%f in ('dir /b raw') do python3 cw_parser.py raw\%%f -o json\
