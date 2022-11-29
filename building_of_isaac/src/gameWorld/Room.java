package gameWorld;

import java.util.ArrayList;
import java.util.List;
import java.util.Random;
import java.io.IOException;
import java.math.*;

import gameobjects.Boss;
import gameobjects.Equipment;
import gameobjects.Fly;
import gameobjects.Gate;
import gameobjects.Hero;
import gameobjects.Obstacle;
import gameobjects.Personage;
import gameobjects.Spider;
import gameobjects.Tear;
import libraries.Timer;
import libraries.Physics;
import libraries.StdDraw;
import libraries.Vector2;
import resources.Controls;
import resources.HeroInfos;
import resources.ImagePaths;
import resources.RoomInfos;
import resources.MonsterInfos;

public class Room
{
	private Hero hero;
	public List <Object> monsterList;
	public int nb_monster;
	public String espece;
	public Room rightDoor;
	public Room leftDoor;
	public Room upDoor;
	public Room downDoor;
	public Gate rightGate;
	public Gate leftGate;
	public Gate upGate;
	public Gate downGate;
	protected String imagePath;
	private Equipment Consumable;
	private boolean consumes;
	public List<Obstacle> ObstacleList;
	

	public Room(Hero hero,String espece,int nb_monster)
	{
		this.hero = hero;
		this.espece = espece;
		this.nb_monster = nb_monster;
		this.monsterList= new ArrayList<Object>();
		this.imagePath = ImagePaths.CLOSED_DOOR;
		this.Consumable = null;
		this.consumes = false;
		this.ObstacleList = new ArrayList<Obstacle>();
		
		CreateObstacle();
		CreateMonster();
		
		this.upGate = new Gate(RoomInfos.UP_DOOR, RoomInfos.DOOR_SIZE,ImagePaths.CLOSED_DOOR,0);
		this.downGate = new Gate(RoomInfos.DOWN_DOOR, RoomInfos.DOOR_SIZE,ImagePaths.CLOSED_DOOR,180);	
		this.leftGate = new Gate(RoomInfos.LEFT_DOOR, RoomInfos.DOOR_SIZE,ImagePaths.CLOSED_DOOR,90);
		this.rightGate = new Gate(RoomInfos.RIGHT_DOOR, RoomInfos.DOOR_SIZE,ImagePaths.CLOSED_DOOR,-90);
	}
	
	public String getImagePath() {
		return imagePath;
	}

	public void setImagePath(String imagePath) {
		this.imagePath = imagePath;
	}

	public Room getRightDoor() {
		return rightDoor;
	}

	public void setRightDoor(Room rightDoor) {
		this.rightDoor = rightDoor;
	}

	public Room getLeftDoor() {
		return leftDoor;
	}

	public void setLeftDoor(Room leftDoor) {
		this.leftDoor = leftDoor;
	}

	public Room getUpDoor() {
		return upDoor;
	}

	public void setUpDoor(Room upDoor) {
		this.upDoor = upDoor;
	}

	public Room getDownDoor() {
		return downDoor;
	}

	public void setDownDoor(Room downDoor) {
		this.downDoor = downDoor;
	}

	public void UpdrawGameObject(String ImagePath)
	{
		
	}
	
	public void DowndrawGameObject(String ImagePath)
	{
		
	}
	public void LeftdrawGameObject(String ImagePath)
	{
		
	}
	public void RightdrawGameObject(String ImagePath)
	{
		
	}
	
	
	/*
	 * Creation de monstre
	 */
	
	public void CreateMonster() {
		if(this.espece == MonsterInfos.SPIDER) {
			for (int i=0; i<nb_monster; i++) {
				Spider spider = new Spider(MonsterInfos.SPIDER_SIZE, MonsterInfos.SPIDER_SPEED, ImagePaths.SPIDER,MonsterInfos.SPIDER_POINT,MonsterInfos.SPIDER_DAMAGE);
				this.monsterList.add(spider);
				
			}
		}
		else if(this.espece == MonsterInfos.FLY) {
			for (int i=0; i<nb_monster; i++) {
				Fly fly = new Fly(MonsterInfos.SPIDER_SIZE, MonsterInfos.FLY_SPEED, ImagePaths.FLY,MonsterInfos.FLY_TEAR_CARRY ,MonsterInfos.FLY_POINT,MonsterInfos.FLY_DAMAGE);
				this.monsterList.add(fly);
				
				
			}
		}
		else if(this.espece == MonsterInfos.BOSS) {
			for (int i=0; i<nb_monster; i++) {
				Boss Boss = new Boss(MonsterInfos.BOSS_SIZE, MonsterInfos.SPIDER_SPEED, ImagePaths.SPIDER,MonsterInfos.BOSS_TEAR_CARRY ,MonsterInfos.BOSS_POINT,MonsterInfos.BOSS_DAMAGE);
				this.monsterList.add(Boss);
				
				
			}
		}
		
	}
	
	
	/*
	 * Creer des obstacles
	 */
	public void CreateObstacle() {
		int randomIndex = new Random().nextInt(4);
		for (int i=0; i<randomIndex; i++) {
			Obstacle obstacle = new Obstacle(RoomInfos.OBSTACLE,this.hero);
			this.ObstacleList.add(obstacle);
		}
		
	};
	
	/*
	 * Gerer les tires du personnage
	 */
	
	
	/*
	 * Les getters et setters
	 */
	public String getEspece() {
		return espece;
	}
	public void setEspece(String espece) {
		this.espece = espece;
	}
	public List<Object> getMonsterList() {
		return monsterList;
	}

	/*
	 * Make every entity that compose a room process one step
	 */
	public void updateRoom()
	{
		makeHeroPlay();
		
	}
	private void makeHeroPlay()
	{
		if(this.ObstacleList.size()!=0) {
			for(int i=0; i<this.ObstacleList.size(); i++) {
				this.ObstacleList.get(i).Blocage(hero);
				this.ObstacleList.get(i).Damage(hero);
			}
		}
		
		
		if(this.Consumable==null && this.monsterList.size()==0 && this.espece!=null && !this.consumes) {
			this.Consumable = new Equipment(RoomInfos.HALF_TILE_SIZE,this.hero);
		}
		
		if(this.monsterList.size()==0) {
			if(upDoor!=null) {
				this.upGate.setImagePath(ImagePaths.OPENED_DOOR);
			}
			if(downDoor!=null) {
				this.downGate.setImagePath(ImagePaths.OPENED_DOOR);
			}
			if(leftDoor!=null) {
				this.leftGate.setImagePath(ImagePaths.OPENED_DOOR);
			}
			if(rightDoor!=null) {
				this.rightGate.setImagePath(ImagePaths.OPENED_DOOR);
			}
		}
		
		/*
		 * Mise a Jour d'ISAAC
		 */
		if(this.monsterList==null) {
			
		}
		if(this.hero!=null) {
			this.hero.updateGameObject();
			if(this.Consumable!=null) {
				if(Physics.rectangleCollision(this.hero.getPosition(), this.hero.getSize(),this.Consumable.getPosition(),this.Consumable.getSize())){
					if(this.Consumable.getType()=="coin") {
						if(this.hero.getNb_piece()<this.hero.getNb_piece_max()) {
							if(this.hero.getNb_piece()+this.Consumable.getNombre()>this.hero.getNb_piece_max()) {
								this.hero.setNb_piece(this.hero.getNb_piece_max());
							}
							else {
								this.hero.setNb_piece(this.hero.getNb_piece()+this.Consumable.getNombre());
							}
							this.Consumable = null;
							this.consumes = true;
						}
					}
					else {
						if(this.hero.getPoint()<this.hero.getMax_point()) {
							if(hero.getPoint()+this.Consumable.getNombre()>this.hero.getMax_point()) {
								this.hero.setPoint(this.hero.getMax_point());
							}else {
								this.hero.setPoint(this.hero.getPoint()+this.Consumable.getNombre());
							}
							this.Consumable = null;
							this.consumes = true;
						}
					}
				}
			}
		}
		
		/*
		 * Mise a jour des monstres et tire des mouches
		 */
		if(this.monsterList.size()!=0) {
			if(hero!=null) {
				for (int i=0; i<this.monsterList.size(); i++) {
					if(Physics.rectangleCollision(hero.getPosition(), hero.getSize(), ((Personage) this.monsterList.get(i)).getPosition(),((Personage) this.monsterList.get(i)).getSize()) ) {
						if(!hero.isContact()) {
							if(hero.getPoint()-((Personage) this.monsterList.get(i)).getDamage()<0) {
								hero.setPoint(0);
							}
							else {
								hero.setPoint(hero.getPoint()-((Personage) this.monsterList.get(i)).getDamage());
							}
							hero.setImagePath(ImagePaths.GAPER);
							hero.setContact(true);
							//System.out.println(hero.getPoint());
						}
						//piece.CreateSpider();
						break;
						}
					}
				}
			if(this.espece == MonsterInfos.SPIDER) {
				for (int i=0; i<this.monsterList.size(); i++) {
					((Personage) this.monsterList.get(i)).updateGameObject();
					if(this.ObstacleList.size()!=0) {
						for(int j=0; j<this.ObstacleList.size(); j++) {
							this.ObstacleList.get(j).Blocage((Personage) this.monsterList.get(i));
						}
					}
				}
			}
			
			else if(this.espece == MonsterInfos.FLY ||this.espece == MonsterInfos.BOSS ) {
				for (int i=0; i<this.monsterList.size(); i++) {
					((Personage) this.monsterList.get(i)).updateGameObject();
				}
				for (int i=0; i<1; i++) {
					try {
						for(int j=0; j<((Personage) this.monsterList.get(i)).tearList.size(); j++) {
							((Personage) this.monsterList.get(i)).tearList.get(j).updateGameObject();
							if(Physics.rectangleCollision(hero.getPosition(), hero.getSize(), ((Personage) this.monsterList.get(i)).tearList.get(j).getPosition(),((Personage) this.monsterList.get(i)).tearList.get(j).getSize()) ) {
								((Personage) this.monsterList.get(i)).tearList.remove(j);
								if(!hero.isContact()) {
									if(hero.getPoint()-((Personage) this.monsterList.get(i)).getDamage()<0) {
										hero.setPoint(0);
									}
									else {
										hero.setPoint(hero.getPoint()-((Personage) this.monsterList.get(i)).getDamage());
									}
									hero.setImagePath(ImagePaths.GAPER);
									hero.setContact(true);
									//System.out.println(hero.getPoint()-((Personage) this.monsterList.get(i)).getDamage());
								}
						
								//piece.CreateSpider();
								break;
									//System.out.println(this.monsterList.get(i).getPosition());
								}
							
							/*
							 * Supprimer la larme de la mouche lorsqu'elle sort de la salle
							 */
							
							if( ((Personage) this.monsterList.get(i)).tearList.get(j).InitialPosition.getY()>0.1 && ((Personage) this.monsterList.get(i)).tearList.get(j).getPosition().getY()<0.1 && ((Personage) this.monsterList.get(i)).tearList.get(j).getPosition().getX()>0.05 && ((Personage) this.monsterList.get(i)).tearList.get(j).getPosition().getX()<0.95 ) {
								((Personage) this.monsterList.get(i)).tearList.remove(j);
							
							}
						
						
							if(((Personage) this.monsterList.get(i)).tearList.get(j).InitialPosition.getY()<0.9 && ((Personage) this.monsterList.get(i)).tearList.get(j).getPosition().getY()>0.9 && ((Personage) this.monsterList.get(i)).tearList.get(j).getPosition().getX()>0.05 && ((Personage) this.monsterList.get(i)).tearList.get(j).getPosition().getX()<0.95 ) {
								((Personage) this.monsterList.get(i)).tearList.remove(j);
								
							}
						
						
							if(((Personage) this.monsterList.get(i)).tearList.get(j).InitialPosition.getX()>0.05 && ((Personage) this.monsterList.get(i)).tearList.get(j).getPosition().getX()<0.05 && ((Personage) this.monsterList.get(i)).tearList.get(j).getPosition().getY()>0.1 && ((Personage) this.monsterList.get(i)).tearList.get(j).getPosition().getY()<0.9 ) {
								((Personage) this.monsterList.get(i)).tearList.remove(j);
								
							}
						
						
							if(((Personage) this.monsterList.get(i)).tearList.get(j).InitialPosition.getX()<0.95 && ((Personage) this.monsterList.get(i)).tearList.get(j).getPosition().getX()>0.95 && ((Personage) this.monsterList.get(i)).tearList.get(j).getPosition().getY()>0.1 && ((Personage) this.monsterList.get(i)).tearList.get(j).getPosition().getY()<0.9 ) {
								((Personage) this.monsterList.get(i)).tearList.remove(j);
							
							}
							
							/*
							 * Porter de tire de la mouche
							 */
							if((Math.abs(((Personage) this.monsterList.get(i)).tearList.get(j).getPosition().getY()-((Personage) this.monsterList.get(i)).tearList.get(j).InitialPosition.getY())>((Personage) this.monsterList.get(i)).getCarry()) ||(Math.abs(((Personage) this.monsterList.get(i)).tearList.get(j).getPosition().getX()-((Personage) this.monsterList.get(i)).tearList.get(j).InitialPosition.getX())>((Personage) this.monsterList.get(i)).getCarry())) {
								((Personage) this.monsterList.get(i)).tearList.remove(j);
							
							}
							}
							}
							catch(Exception e) {
								//  Block of code to handle errors
								}
						}
					}
			
			}
		
		/*
		 * Collision entre une arraigné et ISAAC
		 */
		
		
		
		if(hero!=null) {
			boolean bool = true;
			for (int i=0; i<hero.tearList.size(); i++) {
				if((hero.tearList.get(i).getPosition().getY()<0.1 && StdDraw.isKeyPressed(Controls.TearDown)) || (hero.tearList.get(i).getPosition().getY()>0.9 && StdDraw.isKeyPressed(Controls.TearUp)) || (hero.tearList.get(i).getPosition().getX()<0.05 && StdDraw.isKeyPressed(Controls.TearLeft)) || (hero.tearList.get(i).getPosition().getX()>0.95 && StdDraw.isKeyPressed(Controls.TearRight))) {
					hero.tearList.remove(i);
					bool = false;
				}
				
				/*
				 * Calcul la porté de tire d'ISAAC
				 */
				if(bool) {
					if(hero.tearList.get(i).InitialPosition.getY()>0.1 && hero.tearList.get(i).getPosition().getY()<0.1 && hero.tearList.get(i).getPosition().getX()>0.05 && hero.tearList.get(i).getPosition().getX()<0.95 ) {
						hero.tearList.remove(i);
						bool = false;
					}
				}
				
				/*
				 * Supprimer la larme de ISAAC lorsqu'elle sort de la salle
				 */
				if(bool) {
					if(hero.tearList.get(i).InitialPosition.getY()<0.9 && hero.tearList.get(i).getPosition().getY()>0.9 && hero.tearList.get(i).getPosition().getX()>0.05 && hero.tearList.get(i).getPosition().getX()<0.95 ) {
						hero.tearList.remove(i);
						bool = false;
					}
				}
				if(bool) {
					if(hero.tearList.get(i).InitialPosition.getX()>0.05 && hero.tearList.get(i).getPosition().getX()<0.05 && hero.tearList.get(i).getPosition().getY()>0.1 && hero.tearList.get(i).getPosition().getY()<0.9 ) {
						hero.tearList.remove(i);
						bool = false;
					}
				}
				if(bool) {
					if(hero.tearList.get(i).InitialPosition.getX()<0.95 && hero.tearList.get(i).getPosition().getX()>0.95 && hero.tearList.get(i).getPosition().getY()>0.1 && hero.tearList.get(i).getPosition().getY()<0.9 ) {
						hero.tearList.remove(i);
						bool = false;
					}
				}
				
				if(bool) {
					if((Math.abs(hero.tearList.get(i).getPosition().getY()-hero.tearList.get(i).InitialPosition.getY())>hero.getCarry()) ||(Math.abs(hero.tearList.get(i).getPosition().getX()-hero.tearList.get(i).InitialPosition.getX())>hero.getCarry())) {
						hero.tearList.remove(i);
						bool = false;
					}
				}
				if(bool) {
					if(this.monsterList.size()!=0) {
						for (int j=0; j<this.monsterList.size(); j++) {
							if(Physics.rectangleCollision(this.hero.tearList.get(i).getPosition(), this.hero.tearList.get(i).getSize(), ((Personage) this.monsterList.get(j)).getPosition(),((Personage) this.monsterList.get(j)).getSize()) ) {
								if(((Personage) this.monsterList.get(j)).isContact()) {
									if(((Personage) this.monsterList.get(j)).getPoint()-this.hero.getDamage()<0) {
										((Personage) this.monsterList.get(j)).setPoint(0);
									}else {
										((Personage) this.monsterList.get(j)).setPoint(((Personage) this.monsterList.get(j)).getPoint()-this.hero.getDamage());
									}
									((Personage) this.monsterList.get(j)).setContact(false);
									System.out.println(((Personage) this.monsterList.get(j)).getPoint());
									//System.out.println(((Personage) this.monsterList.get(j)).getPoint()-hero.getDamage());
									//System.out.println(((Personage) this.monsterList.get(j)).isContact());
								}
								bool = false;
								//piece.CreateSpider();
								
							}
							
						}
						
								for (int j=0; j<this.monsterList.size(); j++) {
									if(Physics.rectangleCollision(this.hero.tearList.get(i).getPosition(), this.hero.tearList.get(i).getSize(), ((Personage) this.monsterList.get(j)).getPosition(),((Personage) this.monsterList.get(j)).getSize()) ) {
											if(!((Personage) this.monsterList.get(j)).isContact()) {
												((Personage) this.monsterList.get(j)).setContact(true);
												//((Personage) this.monsterList.get(j)).startime3 = System.nanoTime();
												
											}
										
										if(((Personage) this.monsterList.get(j)).getPoint()==0) {
											this.monsterList.remove(j);
										}
										this.hero.tearList.remove(i);
										bool = false;
										//piece.CreateSpider();
										break;
										
										
							
									}
								}
								}
						
				}
				if(bool) {
					this.hero.tearList.get(i).updateGameObject();
					bool=true;
				}
				
			}
			
		}
		
		if(hero!=null) {
			////
		}
		
		
		/*if(hero.tearList!=null) {
			for (int i=0; i<hero.tearList.size(); i++) {
				hero.tearList.get(i).updateGameObject();
			}
			
		}*/
		
		
		
		
		
	}
	
	

	/*
	 * Drawing
	 */
	public void drawRoom()
	{
		// For every tile, set background color.
		
		
		//StdDraw.picture(RoomInfos.ROOM_POSITION_CENTER_OF_ROOM.getX(), RoomInfos.ROOM_POSITION_CENTER_OF_ROOM.getY(), ImagePaths.ROOM, RoomInfos.ROOM_SIZE.getX(), RoomInfos.ROOM_SIZE.getY());
		
		
		
		for (int i = 0; i < RoomInfos.NB_TILES; i++)
		{
			for (int j = 0; j < RoomInfos.NB_TILES; j++)
			{
				Vector2 position = positionFromTileIndex(i, j);
				StdDraw.filledRectangle(position.getX(), position.getY(), RoomInfos.HALF_TILE_SIZE.getX(),
						RoomInfos.HALF_TILE_SIZE.getY());
			}
		}
		
		StdDraw.picture(RoomInfos.POSITION_CENTER_OF_ROOM.getX(), RoomInfos.POSITION_CENTER_OF_ROOM.getY(),ImagePaths.ROOM, RoomInfos.ROOM_SIZE.getX(), RoomInfos.ROOM_SIZE.getY());
		this.upGate.drawGameObject();
		this.downGate.drawGameObject();
		this.leftGate.drawGameObject();
		this.rightGate.drawGameObject();
		if(this.Consumable!=null) {
			this.Consumable.drawGameObject();
		}
		
		/*
		 * Affichage des obstacles
		 */
		if(this.ObstacleList.size()!=0) {
			for(int i=0; i<this.ObstacleList.size(); i++) {
				this.ObstacleList.get(i).drawGameObject();
			}
		}
		if(hero!=null) {
			hero.drawGameObject();
			for (int i=0; i<hero.tearList.size(); i++) {
				hero.tearList.get(i).drawGameObject();
			}
		}
		//RoomPicture.drawGameObject();
				
		if(this.monsterList.size()!=0) {
			if(this.espece == MonsterInfos.SPIDER) {
				for (int i=0; i<this.monsterList.size(); i++) {
					((Personage) this.monsterList.get(i)).drawGameObject();
					
				}
			}
			else if(this.espece == MonsterInfos.FLY || this.espece == MonsterInfos.BOSS ) {
				for (int i=0; i<this.monsterList.size(); i++) {
					((Personage) this.monsterList.get(i)).drawGameObject();
				}
				for (int i=0; i<1; i++) {
					try {
						  //  Block of code to try
						
					if((Personage) this.monsterList.get(i)!=null){
						for(int j=0; j<((Personage) this.monsterList.get(i)).tearList.size(); j++) {
							((Personage) this.monsterList.get(i)).tearList.get(j).drawGameObject();
								//System.out.println(this.monsterList.get(i).getPosition())
							}
						}
					}
					catch(Exception e) {
					  //  Block of code to handle errors
					}

					
					}
				}
			}//
		}
	
	
	/**
	 * Convert a tile index to a 0-1 position.
	 * 
	 * @param indexX
	 * @param indexY
	 * @return
	 */
	private static Vector2 positionFromTileIndex(int indexX, int indexY)
	{
		return new Vector2(indexX * RoomInfos.TILE_WIDTH + RoomInfos.HALF_TILE_SIZE.getX(),
				indexY * RoomInfos.TILE_HEIGHT + RoomInfos.HALF_TILE_SIZE.getY());
	}
	
}

