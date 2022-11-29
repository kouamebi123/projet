package gameWorld;

import java.util.*;

import gameobjects.Hero;
import gameobjects.Personage;
import gameobjects.Spider;
import gameobjects.Fly;
import gameobjects.Boss;
import libraries.Physics;
import libraries.StdDraw;
import libraries.Vector2;
import resources.Controls;
import resources.ImagePaths;
import resources.RoomInfos;
import resources.MonsterInfos;
import java.awt.Font;
public class GameWorld
{
	public Room currentRoom1;
	public Map <String,Room> ListRoom;
	private Hero hero;
	public String currentEspece;
	private boolean change = false;
	private boolean change1 = false;
	private long times;
	private long times2;
	//public Map <Integer,Spider> monsters = new TreeMap <Integer,Spider>();
	
	// A world needs a hero
	public GameWorld(Hero hero)
	{
		this.hero = hero;
		this.times =System.nanoTime();
		this.times2 = 0;
		this.ListRoom = new TreeMap<String,Room>();
		CreateRoom();
		IntialisationPorte();
		
		
	}
	
	public void CreateRoom() {
		this.ListRoom.put("spawn", new Room(hero,null,0));
		this.ListRoom.put("shop", new Room(hero,null,0));
		this.ListRoom.put("monster1", new Room(hero,MonsterInfos.SPIDER,4));
		this.ListRoom.put("monster2", new Room(hero,MonsterInfos.FLY,4));
		this.ListRoom.put("boss", new Room(hero,MonsterInfos.BOSS,1));
	}
	
	/*
	 * permettant de d'initialiser les differents chemins des salles
	 */
	public void IntialisationPorte() {
		this.ListRoom.get("spawn").setLeftDoor(this.ListRoom.get("shop"));
		this.ListRoom.get("spawn").setUpDoor(this.ListRoom.get("monster1"));
		this.ListRoom.get("shop").setRightDoor(this.ListRoom.get("spawn"));
		this.ListRoom.get("monster1").setDownDoor(this.ListRoom.get("spawn"));
		this.ListRoom.get("monster1").setUpDoor(this.ListRoom.get("monster2"));
		this.ListRoom.get("monster2").setDownDoor(this.ListRoom.get("monster1"));
		this.ListRoom.get("monster2").setUpDoor(this.ListRoom.get("boss"));
		this.ListRoom.get("boss").setDownDoor(this.ListRoom.get("monster2"));
		//this.currentRoom1 = this.ListRoom.get("boss");
		this.currentRoom1 = this.ListRoom.get("spawn");
		
	}
	
	/*
	 * Permet de changer les salles
	 */
	public void ChangerDeSalle() {
		if(!change) {
			if(this.currentRoom1!=null) {
				if(this.currentRoom1.monsterList.size()==0) {
				if(Physics.rectangleCollision(hero.getPosition(), hero.getSize(),this.currentRoom1.upGate.getPosition(),this.currentRoom1.upGate.getSize()) && StdDraw.isKeyPressed(Controls.goUp)) {
					if(this.currentRoom1.getUpDoor()!=null) {
						this.currentRoom1 = this.currentRoom1.getUpDoor();
						change=true;
						hero.setPosition(RoomInfos.DOWN_DOOR);
					}		
				}
				
				if(Physics.rectangleCollision(hero.getPosition(), hero.getSize(),this.currentRoom1.downGate.getPosition(),this.currentRoom1.downGate.getSize()) && StdDraw.isKeyPressed(Controls.goDown)) {
					if(this.currentRoom1.getDownDoor()!=null) {
						this.currentRoom1 = this.currentRoom1.getDownDoor();
						change=true;
						hero.setPosition(RoomInfos.UP_DOOR);
					}		
				}
				if(Physics.rectangleCollision(hero.getPosition(), hero.getSize(),this.currentRoom1.leftGate.getPosition(),this.currentRoom1.leftGate.getSize()) && StdDraw.isKeyPressed(Controls.goLeft)) {
					if(this.currentRoom1.getLeftDoor()!=null) {
						this.currentRoom1 = this.currentRoom1.getLeftDoor();
						change=true;
						hero.setPosition(RoomInfos.RIGHT_DOOR);
					}		
				}
				if(Physics.rectangleCollision(hero.getPosition(), hero.getSize(),this.currentRoom1.rightGate.getPosition(),this.currentRoom1.rightGate.getSize()) && StdDraw.isKeyPressed(Controls.goRight)) {
					if(this.currentRoom1.getRightDoor()!=null) {
						this.currentRoom1 = this.currentRoom1.getRightDoor();
						change=true;
						hero.setPosition(RoomInfos.LEFT_DOOR);
					}		
				}
				}
				//	
			}
			
		}
		
		if((System.nanoTime()-this.times)/1000000000>0.5) {
			change=false;
			this.times = System.nanoTime();
		}
		
	}
	
	
	public void processUserInput()
	{
		ChangerDeSalle();
		processKeysForMovement();
		processKeysForMovementTear();
		if(this.currentRoom1.getMonsterList()!=null) {
			if(this.currentRoom1.getEspece() == MonsterInfos.SPIDER) {
				for (int i=0; i<this.currentRoom1.getMonsterList().size(); i++) {
					((Spider) this.currentRoom1.getMonsterList().get(i)).deplacement();
				}
			}
			else if(this.currentRoom1.getEspece() == MonsterInfos.BOSS) {
				for (int i=0; i<1; i++) {
					try {
						( (Boss) this.currentRoom1.getMonsterList().get(i)).deplacementB(this.hero);
						}
						catch(Exception e) {
						  //  Block of code to handle errors
						}
					
				}
			}
			else {
				for (int i=0; i<1; i++) {
					try {
						( (Fly) this.currentRoom1.getMonsterList().get(i)).deplacements(this.hero);
						}
						catch(Exception e) {
						  //  Block of code to handle errors
						}
					
				}
			}
			
			
			}
		Cheated();
	}

	public boolean gameOver()
	{
		if(hero.getPoint()==0) {
			return true;
		}
		return false;
	}

	public void updateGameObjects()
	{
		if(!gameOver()) {
			currentRoom1.updateRoom();
		}
		
	}
	
	public void drawGameObjects()
	{
		currentRoom1.drawRoom();
		
		if(this.currentRoom1.getEspece() == MonsterInfos.BOSS) {
			if(this.currentRoom1.getMonsterList().size()!=0) {
				printLife(((Boss) this.currentRoom1.getMonsterList().get(0)),0.72,0.04,MonsterInfos.BOSS_POINT,"Boss life","haut");
			}
			
		}
		
		printLife(this.hero,0.07,0.95,hero.getMax_point(),"Issac life","bas");
		printCoin(this.hero.getNb_piece(),0.74,0.95,RoomInfos.PIECE);
		
		if(this.ListRoom.get("boss").monsterList.size()==0) {
			StdDraw.picture(RoomInfos.POSITION_CENTER_OF_ROOM.getX(), RoomInfos.POSITION_CENTER_OF_ROOM.getY(), ImagePaths.WIN_SCREEN, 0.92, 0.92,
					0);
			StdDraw.setPenColor(StdDraw.BLACK);
			Font font = new Font("Arial Black", Font.BOLD, 42);
			StdDraw.setFont(font);
			StdDraw.text(0.5, 0.5, "CONGRATULATIONS");
		}
		if(gameOver()) {
			StdDraw.picture(RoomInfos.POSITION_CENTER_OF_ROOM.getX(), RoomInfos.POSITION_CENTER_OF_ROOM.getY(), ImagePaths.LOSE_SCREEN, 0.92, 0.92,
					0);
			StdDraw.setPenColor(StdDraw.WHITE);
			hero.setPoint(0);
			Font font = new Font("Arial Black", Font.BOLD, 60);
			StdDraw.setFont(font);
			StdDraw.text(0.5, 0.5, "GAME OVER");
		}
		
	}

	/*
	 * Keys processing
	 */

	private void processKeysForMovement()
	{
		
		if (StdDraw.isKeyPressed(Controls.goUp))
		{
			hero.setImagePath(ImagePaths.ISAAC);
			hero.goUpNext();
		}
		if (StdDraw.isKeyPressed(Controls.goDown))
		{
			hero.setImagePath(ImagePaths.ISAAC);
			hero.goDownNext();
			
		}
		if (StdDraw.isKeyPressed(Controls.goRight))
		{
			hero.setImagePath(ImagePaths.ISAAC);
			hero.goRightNext();
		}
		if (StdDraw.isKeyPressed(Controls.goLeft))
		{
			hero.setImagePath(ImagePaths.ISAAC);
			hero.goLeftNext();
		}
	}
	
	private void processKeysForMovementTear()
	{
		
		if (StdDraw.isKeyPressed(Controls.TearUp))
		{
			hero.TearUpNext();
		}
		if (StdDraw.isKeyPressed(Controls.TearDown))
		{
			hero.TearDownNext();
		}
		if (StdDraw.isKeyPressed(Controls.TearRight))
		{
			hero.TearRightNext();
		}
		if (StdDraw.isKeyPressed(Controls.TearLeft))
		{
			hero.TearLeftNext();
		}
	}
	
	/*
	 * Affichage des points de vie
	 */
	public void printLife(Object pers,double x,double y,int MaxLife,String text,String placement) {
		double n = 0;
		int reste = (MaxLife-((Personage) pers).getPoint())/2;
		
		/*
		 * Affichage des coeurs rouges
		 */
		for(int i=0; i<((Personage) pers).getPoint()/2; i++) {
			StdDraw.picture(x+n, y, ImagePaths.HEART_HUD, 0.05, 0.05,
					0);
			n+= 0.05;
		}
		
		/*
		 * Affichage des demi-coeurs rouges
		 */
		if(((Personage) pers).getPoint()%2!=0) {
			StdDraw.picture(x+n, y, ImagePaths.HALF_HEART_HUD, 0.05, 0.05,
					0);
			n+= 0.05;
		}
		
		/*
		 * Affichage des coeurs noirs
		 */
		for(int i=0; i<reste; i++) {
			StdDraw.picture(x+n, y, ImagePaths.EMPTY_HEART_HUD, 0.05, 0.05,
					0);
			n+= 0.05;
		}
		StdDraw.setPenColor(StdDraw.BLACK);
		Font font = new Font("Arial", Font.BOLD, 17);
		StdDraw.setFont(font);
		if(placement=="bas") {
			StdDraw.text(x+0.038, y-0.05, text);
		}else {
			StdDraw.text(x+0.038, y+0.05, text);
		}
	}
	
	/*
	 * Affiche des pieces
	 */
	public void printCoin(int piece,double x,double y,Vector2 size) {
		/*
		 * Affiche la piece
		 */
		StdDraw.picture(x, y, ImagePaths.COIN, size.getX(), size.getY(),
				0);
		/*
		 * Affiche le nombre de piece
		 */
		StdDraw.text(x+0.05, y, Integer.toString(piece));
	};
	
	/*
	 * La methode triche
	 */
	public void Cheated() {
		if (StdDraw.isKeyPressed(Controls.l))
		{
			hero.setSpeed(0.025);
		}
		if (StdDraw.isKeyPressed(Controls.k))
		{
			this.currentRoom1.getMonsterList().clear();
		}
		if (StdDraw.isKeyPressed(Controls.p))
		{
			hero.setDamage(20);
		}
		if (StdDraw.isKeyPressed(Controls.o))
		{
			if((System.nanoTime()-this.times2)/100000000>0.1){
				hero.setNb_piece(hero.getNb_piece()+10);
				this.times2 = System.nanoTime();
			}
			
		}
	}
	
}
