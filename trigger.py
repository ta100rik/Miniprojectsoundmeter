from soundmeter.meter import Meter
from soundmeter.cli import get_meter_kwargs, setup_user_dir
import pyaudio


def main():
    pyaudio.paJACK = 12
    setup_user_dir()
    kwargs = get_meter_kwargs()
    meter = Meter(**kwargs)
    meter.start()


if __name__ == '__main__':
    main()