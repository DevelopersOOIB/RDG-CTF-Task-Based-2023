# pain ahead
import marshal

f = open("Shuffle.pyc")
f.seek(8)
code = marshal.load(f)
f.close()

exec code