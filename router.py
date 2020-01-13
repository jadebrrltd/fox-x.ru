from views import IndexView, CoeffView

routes = (
    dict(method='GET', path='/', handler=IndexView, name='index'),
    dict(method='POST', path='/coeff', handler=CoeffView, name='coeff'),
)
