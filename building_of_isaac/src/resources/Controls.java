package resources;

import libraries.Keybinding;
import libraries.Keybinding.SpecialKeys;

public class Controls
{
	public static int goUp = Keybinding.keycodeOf('z');
	public static int goDown = Keybinding.keycodeOf('s');
	public static int goRight = Keybinding.keycodeOf('d');
	public static int goLeft = Keybinding.keycodeOf('q');
	
	public static int TearUp = Keybinding.keycodeOf(SpecialKeys.UP);
	public static int TearDown = Keybinding.keycodeOf(SpecialKeys.DOWN);
	public static int TearRight = Keybinding.keycodeOf(SpecialKeys.RIGHT);
	public static int TearLeft = Keybinding.keycodeOf(SpecialKeys.LEFT);
	
	public static int i = Keybinding.keycodeOf('i');
	public static int l = Keybinding.keycodeOf('l');
	public static int k = Keybinding.keycodeOf('k');
	public static int p = Keybinding.keycodeOf('p');
	public static int o = Keybinding.keycodeOf('o');
}
