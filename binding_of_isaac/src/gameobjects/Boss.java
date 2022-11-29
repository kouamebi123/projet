package gameobjects;
import java.util.Random;
import libraries.Vector2;
import resources.HeroInfos;
import resources.ImagePaths;
import resources.MonsterInfos;

public class Boss extends Personage
{

	public int directions; //Sens de deplacement
	public boolean n=true;
	public double timedeplace; // Temps a partir duquel le boss doit se deplacer deplacement;
	private double TirVertical = 0; //Sens de deplacement des tirs
	private double TirHorizontal = 0; //Sens de deplacement des tirs
	
	/*
	 * Generateur de coordonnée
	 */
	public static double generate() {
		Random r = new Random();
		double randomValue = r.nextDouble();
		if(randomValue<0.7 && randomValue>0.3 || randomValue<0.1 || randomValue>0.9) {
			randomValue = generate();
		}
		return randomValue;
	}
	
	public Boss(Vector2 size, double speed, String imagePath, double carry, int point, int damage)
	{
		super(new Vector2(generate(), generate()),size,speed,imagePath,carry,point,damage);
		Random ran = new Random();
        this.directions = ran.nextInt(4)+1;
        this.startime1 = System.nanoTime();
	}
	
	public int getDirections() {
		return directions;
	}

	public void setDirections(int directions) {
		this.directions = directions;
	}

	public boolean getN() {
		return n;
	}

	public void setN(boolean n) {
		this.n = n;
	}
	
	
	/*
	 * Deplacement aleatoire de l'arraigné et sens de deplacement des tirs
	 */
	public void deplacementB(Hero hero) {
		this.time = (System.nanoTime()-this.startime)/1000000000;
		if(this.getN()) {
			Random ran = new Random();
			this.setDirections(ran.nextInt(4)+1);
			double randomValue = ran.nextDouble();
			this.timedeplace = randomValue;
		}
		if(this.time>this.timedeplace && this.time<this.timedeplace+1.1) {
			processKeysForMovementSpider();
			this.setN(false);
		}
		if(this.time>this.timedeplace+1.1 && this.time<this.timedeplace+2.1) {
			deplacementTear (hero);
		}
		
		if(this.time>=this.timedeplace+2.1) {
			
			this.startime = System.nanoTime();
			this.setN(true);
			return;
		}
		
		
		
	}
	
	/*
	 * Sens de deplacement des tirs du boss en fonction de la position d'ISSAC
	 */
	public void deplacementTear (Hero hero) {
		this.TirHorizontal = (hero.getPosition().getX() - this.getPosition().getX())*MonsterInfos.FLY_SPEED;
		this.TirVertical = (hero.getPosition().getY() - this.getPosition().getY())*MonsterInfos.FLY_SPEED;
		this.time2 = ((System.nanoTime()-this.startime1)/1000000000);
		if(this.time2>0.20) {
			if(Math.abs(hero.getPosition().getX() - this.getPosition().getX())<0.3) {
				Tear bal = new Tear(position, HeroInfos.TEAR_SIZE, MonsterInfos.TEAR_SPEED, ImagePaths.TEAR,this.TirVertical*940,this.TirHorizontal*940);
				this.tearList.add(bal);
			}
			else if(Math.abs(hero.getPosition().getX() - this.getPosition().getX())<0.6) {
				Tear bal = new Tear(position, HeroInfos.TEAR_SIZE, MonsterInfos.TEAR_SPEED, ImagePaths.TEAR,this.TirVertical*500,this.TirHorizontal*500);
				this.tearList.add(bal);
			}
			else {
				Tear bal = new Tear(position, HeroInfos.TEAR_SIZE, MonsterInfos.TEAR_SPEED, ImagePaths.TEAR,this.TirVertical*220,this.TirHorizontal*220);
				this.tearList.add(bal);
			}
			
			//System.out.println(hero.getPosition().getX() - this.getPosition().getX());
			this.time2 = 0;
			this.startime1 = System.nanoTime();
		}
	}
	
	/*
	 * Deplacement des tirs
	 */
	private void processKeysForMovementSpider()
	{
		
		if (this.getDirections()==1)
		{
			this.goUpNext();
		}
		if (this.getDirections()==2)
		{
			this.goDownNext();
			
		}
		if (this.getDirections()==3)
		{
			this.goRightNext();
		}
		if (this.getDirections()==4)
		{
			this.goLeftNext();
		}
	}
}
