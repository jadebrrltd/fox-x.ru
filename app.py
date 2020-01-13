import argparse
from aiohttp import web
from router import routes


parser = argparse.ArgumentParser(description="aiohttp server example")
parser.add_argument('--path')
parser.add_argument('--port')

app = web.Application()



if __name__ == '__main__':
    app = web.Application()

    args = parser.parse_args()
    for route in routes:
        app.router.add_route(**route)
    web.run_app(app, path=args.path, port=args.port)
