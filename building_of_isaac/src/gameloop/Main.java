package gameloop;

import java.util.Random;

import gameWorld.GameWorld;
import gameobjects.Hero;
import gameobjects.Spider;
import libraries.StdDraw;
import libraries.Timer;
import libraries.Vector2;
import resources.DisplaySettings;
import resources.HeroInfos;
import resources.ImagePaths;
import resources.RoomInfos;

public class Main
{
	
	public static void main(String[] args)
	{
		// Hero, world and display initialisation.
		/*Hero isaacs = new Hero(RoomInfos.POSITION_CENTER_OF_ROOM, HeroInfos.ISAAC_SIZE, HeroInfos.ISAAC_SPEED, ImagePaths.ISAAC);
		GameWorld worlds = new GameWorld(isaacs);*/
		
		//
		
		//System.out.println(randomValue);
		
		Hero isaac = new Hero(RoomInfos.POSITION_CENTER_OF_ROOM, HeroInfos.ISAAC_SIZE, HeroInfos.ISAAC_SPEED, ImagePaths.ISAAC,HeroInfos.TEAR_CARRY,HeroInfos.ISAAC_POINT,HeroInfos.ISAAC_DAMAGE,HeroInfos.NB_PIECE_MAX);
		GameWorld world = new GameWorld(isaac);
		
		initializeDisplay();

		// Main loop of the game
		
		while (!world.gameOver())
		{
			processNextStep(world);
			
		}
		
	}

	private static void processNextStep(GameWorld world)
	{
		Timer.beginTimer();
		StdDraw.clear();
		world.processUserInput();
		world.updateGameObjects();
		world.drawGameObjects();
		StdDraw.show();
		Timer.waitToMaintainConstantFPS();
		
	}

	private static void initializeDisplay()
	{
		// Set the window's size, in pixels.
		// It is strongly recommended to keep a square window.
		StdDraw.setCanvasSize(RoomInfos.NB_TILES * DisplaySettings.PIXEL_PER_TILE,
				RoomInfos.NB_TILES * DisplaySettings.PIXEL_PER_TILE);

		// Enables double-buffering.
		// https://en.wikipedia.org/wiki/Multiple_buffering#Double_buffering_in_computer_graphics
		StdDraw.enableDoubleBuffering();
	}
}
