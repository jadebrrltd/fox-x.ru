from aiohttp import web
from router import routes

app = web.Application()


for route in routes:
    app.router.add_route(**route)

web.run_app(app)